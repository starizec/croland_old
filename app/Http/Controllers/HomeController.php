<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use App\VendorSadrzaj;
use App\KategorijeVendora;
use App\VendorIcons;

use App\Services\RegijeService as Regije;
use App\Services\KategorijeServices as Kategorije;
use App\Services\MapLocationsServices as Locations;
use App\Services\StoreServices as Store;
use App\Services\VendorServices as VendorServices;

class HomeController extends Controller
{
    public function index(){

        $img_slavonija = Vendors::where('id_regije', '1')->orderByRaw('RAND()')->take(1)->get();
        $img_sredisnja = Vendors::where('id_regije', '2')->orderByRaw('RAND()')->take(1)->get();

        $vendors = VendorServices::getFavoriteVendors();

        $icons = VendorIcons::all();

        foreach($vendors as $vendor){
            $ext = explode('.', $vendor->naslovna_slika);

            if($ext[1] != 'jpg'){
                $sadrzaj_vendora[$vendor->id] = VendorSadrzaj::where('vendor_id', $vendor->id)->first();
            }
        }

        $filter_regije = new Regije();
        $filter_regije = $filter_regije->all();

        $filter_kategorije = new Kategorije();
        $filter_kategorije = $filter_kategorije->all();

        $loc = new Locations();
        $loc = $loc->all(0);

        $display_products = new Store;
        $display_products = $display_products->DisplayProducts(0, 'zadano');

        return view('frontend.home')//->with('img_slavonija', $img_slavonija[0])
                                    //->with('img_sredisnja', $img_sredisnja[0])
                                    ->with('vendors', $vendors)
                                    ->with('sadrzaj_vendora', @$sadrzaj_vendora)
                                    ->with('filter_regije', $filter_regije)
                                    ->with('filter_kategorije', $filter_kategorije)
                                    ->with('locations', $loc)
                                    ->with('icons', $icons)
                                    ->with('products', $display_products);
    }

    public function onama(){
        return view('frontend.onama');
    }

    public function search(request $request){
        
        if(count($request->input('kategorija')) > 0 || count($request->input('regija')) > 0){
            if($request->input('regija') != null){
                $vendors_regije = [];
                foreach($request->input('regija') as $id){
                    $vendors_regije[] = Vendors::where('id_regije', $id)->get();
                }
            }
            
            if($request->input('kategorija') != null){
                $vendors_kategorije = [];
                foreach($request->input('kategorija') as $id){
                    $vendors_kategorije[] = KategorijeVendora::where('id_kategorije', $id)->get();
                }
            }

            $svi_vendori = Vendors::all();

            $vendors_kategorije = $vendors_kategorije[0];
            $vendors_regije = $vendors_regije[0];

            $vendors = [];

            foreach($vendors_regije as $key_regije => $value_regije){
                foreach($vendors_kategorije as $key_kategorije => $value_kategorije){
                    if($value_regije->id == $value_kategorije->id_vendora){
                        $vendors[$value_regije->id] = $value_regije;
                    }
                }
            }
        }

        $regije = new Regije();
        $filter_regije = $regije->all();

        $filter_kategorije = new Kategorije();
        $filter_kategorije = $filter_kategorije->all();

        $sadrzaj_vendora = [];

        foreach($vendors as $vendor){
            $ext = explode('.', $vendor->naslovna_slika);

            if($ext[1] != 'jpg'){
                $sadrzaj_vendora[$vendor->id] = VendorSadrzaj::where('vendor_id', $vendor->id)->first();
            }else{}
        }

        $loc = new Locations(0);
        $loc = $loc->all();

        return view('frontend.home')->with('search_results', $vendors_kategorije)
                                    ->with('vendors', $vendors)
                                    ->with('sadrzaj_vendora', $sadrzaj_vendora)
                                    ->with('filter_regije', $filter_regije)
                                    ->with('filter_kategorije', $filter_kategorije)
                                    ->with('locations', $loc);;
    }

    public function test(){
        $display_products = new Store;
        $display_products = $display_products->DisplayProducts(0);

        return $display_products;
    }
}
