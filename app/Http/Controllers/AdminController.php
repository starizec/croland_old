<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VendorKategorije;
use App\KategorijeVendora;
use App\VendorStatus;
use App\VendorSadrzaj;
use App\Vendors;
use App\VendorIcons;
use App\Tags;
use App\VendorTags;

use App\Services\OrdersServices; 

use App\Services\VendorServices as VendorServices;


class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function vendors(){
        $vendors = new Vendors();
        $vendors = $vendors->all();

        return view('admin.vendors')->with('vendors', $vendors);
    }

    public function vendor(){
        $vendori = new Vendors();
        $vendori = $vendori->all();

        $kategorije = new VendorKategorije();
        $kategorije = $kategorije->all();

        $vendor_icons = new VendorIcons();
        $vendor_icons = $vendor_icons->all();

        $oznake = new Tags();
        $oznake = $oznake->all();

        return view('admin.vendor')->with('vendori', $vendori)
                                   ->with('kategorije', $kategorije)
                                   ->with('icons', $vendor_icons)
                                   ->with('oznake', $oznake);
    }

    public function vendorEdit($id){
        $vendor = new Vendors();
        $vendor = $vendor->where('id', $id)->first();

        $kategorije_vendora = new KategorijeVendora();
        $kategorije_vendora = $kategorije_vendora->where('id_vendora', $id)->get();

        $oznake_vendora = new VendorTags();
        $oznake_vendora = $oznake_vendora->where('vendor_id', $id)->get();

        $oznake = new Tags();
        $oznake = $oznake->all();

        $kategorije = new VendorKategorije();
        $kategorije = $kategorije->all();

        $icone = new VendorIcons();
        $icone = $icone->all();

        $sadrzaj = new VendorSadrzaj();
        $sadrzaj = $sadrzaj->where('vendor_id', $id)->get();

        return view('admin.vendor_edit')->with('vendor', $vendor)
                                        ->with('kategorije', $kategorije)
                                        ->with('kategorije_vendora', $kategorije_vendora)
                                        ->with('oznake', $oznake)
                                        ->with('oznake_vendora', $oznake_vendora)
                                        ->with('sadrzaj', $sadrzaj)
                                        ->with('icons', $icone);
    }

    public function deleteVendor($id){
        VendorServices::removeVendor($id);

        return redirect('/admin/vendors/');
    }


    public function updateVendor(Request $request){
        $vendor = new Vendors();
        $vendor = $vendor->find($request->input('id'));
        $icons = array();
        

        foreach($request->input('icon') as $key => $value){
            foreach($request->input('icon') as $icon_id => $txt){
                if($value == $icon_id){
                    $icons[$icon_id] = $txt;
                }
            }
        }
  

        $vendor->update([
            'slug' => '0',
            'naziv' => base64_encode($request->naziv),
            'adresa' => base64_encode($request->adresa),
            'icone' => serialize($icons),
            'mjesto' => base64_encode($request->mjesto),
            'postanski_broj' => $request->postanski_broj,
            'oib' => $request->oib,
            'opis' => base64_encode($request->opis),
            'lokacija' => $request->lokacija,
            'email' => $request->email,
            'telefon' => $request->telefon,
        ]);

        if($request->hasFile('naslovna_slika')){
            $file = $request->file('naslovna_slika');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path, $filename);

            $vendor->update([
                'naslovna_slika' => $filename
            ]);
        }

        $kategorije_vendora = new KategorijeVendora();
        $kategorije_vendora = $kategorije_vendora->where('id_vendora', $request->input('id'))->delete();

        //spremanje kategorije s checkmark
        if(!empty($request->kategorija)){
            foreach($request->kategorija as $kategorija){
                $kategorije_vendora = new KategorijeVendora();

                $kategorije_vendora->id_vendora = $request->input('id');
                $kategorije_vendora->id_kategorije = $kategorija;

                $kategorije_vendora->save();
            }
        }

        $oznaka_vendora = new VendorTags();
        $oznaka_vendora = $oznaka_vendora->where('vendor_id', $request->input('id'))->delete();

        //spremanje oznaka s checkmark
        if(!empty($request->oznake)){
            foreach($request->oznake as $oznaka){
                $oznaka_vendora = new VendorTags();

                $oznaka_vendora->vendor_id = $request->input('id');
                $oznaka_vendora->tag_id = $oznaka;

                $oznaka_vendora->save();
            }
        }

        return redirect('/admin/vendor/edit/'.$request->input('id'));
    }

    public function storeVendor(Request $request){
        $vendors = new Vendors();

        if(!empty($request->input('icons'))){
            foreach($request->input('icons') as $key => $value){

                foreach($request->input('icon') as $icon_id => $txt){
                    if($value == $icon_id){
                        $icons[$icon_id] = $txt;
                    }
                }
            }
        }else{
            $icons = 0;
        }   

        $vendors->slug = $this->createSlug($request->input('naziv'));
        $vendors->naziv = base64_encode($request->input('naziv'));
        $vendors->opis = base64_encode($request->input('opis'));
        $vendors->adresa = base64_encode($request->input('adresa'));
        $vendors->icone = serialize($icons);
        $vendors->mjesto = base64_encode($request->input('mjesto'));
        $vendors->postanski_broj = $request->input('postanski_broj');
        $vendors->lokacija = $request->input('lokacija');
        $vendors->oib = $request->input('oib');
        $vendors->email = $request->input('email');
        $vendors->telefon = $request->input('telefon');
        $vendors->created_by = 1;
        $vendors->updated_by = 1;
        $vendors->owner_id = 0;
        $vendors->vendor_status_id = 1;

        if($request->hasFile('naslovna_slika')){
            $file = $request->file('naslovna_slika');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path, $filename);

            $vendors->naslovna_slika = $filename;
        }

        if(!empty($request->input('youtube_link'))){
            $vendors->youtube_link = $request->input('youtube_link');
        }

        $vendors->save();

        //spremanje kategorije s checkmark
        if(!empty($request->kategorija)){
            foreach($request->kategorija as $kategorija){
                $kategorije_vendora = new KategorijeVendora();

                $kategorije_vendora->id_vendora = $vendors->id;
                $kategorije_vendora->id_kategorije = $kategorija;

                $kategorije_vendora->save();
            }
        }

        //spremanje nove kategorije
        if(!empty($request->input('nova_kategorija'))){
            $kategorije = explode(',', $request->input('nova_kategorija'));

            foreach($kategorije as $kat){
                $kategorije_vendora = new KategorijeVendora();
                $kategorija         = new vendorKategorije();

                $kategorija->naziv = $kat;
                $kategorija->save();
                
                $kategorije_vendora->id_vendora    = $vendors->id;
                $kategorije_vendora->id_kategorije = $kategorija->id;

                $kategorije_vendora->save();
            }
        }

        //spremanje oznaka s checkmark
        if(!empty($request->oznake)){
            foreach($request->oznake as $oznaka){
                $oznaka_vendora = new VendorTags();

                $oznaka_vendora->vendor_id = $vendors->id;
                $oznaka_vendora->tag_id = $oznaka;

                $oznaka_vendora->save();
            }
        }

        //spremanje novih oznaka
        if(!empty($request->input('nova_oznaka'))){
            $oznake = explode(',', $request->input('nova_oznaka'));

            foreach($oznake as $oznaka){
                $ozn         = new Tags();
                $oznaka_vendora = new VendorTags();

                $ozn->naziv  = $oznaka;
                $ozn->save();

                $oznaka_vendora->vendor_id = $vendors->id;
                $oznaka_vendora->tag_id = $ozn->id;
                $oznaka_vendora->save();
            }
        }

        if(!empty($request->input('gotovo'))){
            return redirect('/admin/vendor');
        }elseif(!empty($request->input('jedanstupac'))){
            return redirect('/admin/vendor/jedanstupac/'.$vendors->id);
        }elseif(!empty($request->input('dvastupca'))){
            return redirect('/admin/vendor/dvastupca/'.$vendors->id);
        }else{
            return redirect('/admin/vendor');
        }
        
    }

    public function vendorJedanStupac($id){
        $vendor = new Vendors();
        $vendor = $vendor->where('id', $id)->first();

        $sadrzaj = new VendorSadrzaj();
        $sadrzaj = $sadrzaj->where('vendor_id', $id)->orderBy('id', 'asc')->get();

        return view('admin.1column')->with('vendor', $vendor)
                                    ->with('sadrzaj', $sadrzaj);
    }

    public function updateVendorSadrzajOne(Request $request){
        $sadrzaj = new VendorSadrzaj();
        $sadrzaj = $sadrzaj->find($request->input('sadrzaj_id'));

        $sadrzaj->update([
            'naslov' => base64_encode($request->naslov),
            'sadrzaj' => base64_encode($request->sadrzaj),
            'prikaz_sadrzaja' => base64_encode($request->prikaz_sadrzaja),
        ]);

        if($request->hasFile('medij')){
            $file = $request->file('medij');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path, $filename);

            $sadrzaj->update([
                'medij' => $filename
            ]);
        }

        return redirect('/admin/vendor/edit/'.$request->vendor_id);
    }

    public function storeVendorSadrzajOne(Request $request){
        $sadrzaj = new VendorSadrzaj();

        $sadrzaj->naslov = base64_encode($request->input('naslov'));
        $sadrzaj->sadrzaj = base64_encode($request->input('sadrzaj'));
        $sadrzaj->vendor_id = $request->input('vendor_id');
        $sadrzaj->prikaz_sadrzaja = $request->input('prikaz_sadrzaja');

        if($request->hasFile('medij')){
            if(sizeof($request->file('medij')) < 2){
                $file = $request->file('medij');
                $filename = $file[0]->getClientOriginalName();
                $path = public_path().'/uploads/';
                $file[0]->move($path, $filename);
    
                $sadrzaj->medij = $filename;
            }elseif(sizeof($request->file('medij')) > 1){
                foreach($request->file('medij') as $file){
                    $filename = $file->getClientOriginalName();
                    $path = public_path().'/uploads/';
                    $file->move($path, $filename);
                    $filenames[] = $filename;
                }
                $sadrzaj->medij = serialize($filenames);
            }
        }

        $sadrzaj->save();

        if(!empty($request->input('spremi'))){
            return redirect('/admin/vendor');
        }elseif(!empty($request->input('dodajjedan'))){
            return redirect('/admin/vendor/jedanstupac/'.$request->input('vendor_id'));
        }elseif(!empty($request->input('dodajdva'))){
            return redirect('/admin/vendor/dvastupca/'.$request->input('vendor_id'));
        }else{
            return redirect('/admin/vendor');
        }
    }

    //prikaz kategorija
    public function vendorKategorije(){
        $kategorije = new VendorKategorije();
        $kategorije = $kategorije->all();

        return view('admin.vendor_kategorije')->with('kategorije', $kategorije);
    }

    public function deleteKategoriju($id){
        $kategorija = new VendorKategorije();
        $kategorija = $kategorija->where('id', $id)->delete();

        return redirect('/admin/vendor/kategorije/');
    }

    public function storeKategorije(Request $request){
        $vendor_kategorije = new VendorKategorije();

        $vendor_kategorije->naziv = $request->input('naziv');

        $vendor_kategorije->save();

        return redirect('/admin/vendor/kategorije');
    }

    public function vendorStatusi(){
        $statusi = new VendorStatus();
        $statusi = $statusi->all();

        return view('admin.vendor_statusi')->with('statusi', $statusi);
    }

    public function storeStatus(Request $request){
        $statusi = new VendorStatus();

        $statusi->naziv = $request->input('naziv');

        $statusi->save();

        return redirect('/admin/vendor/statusi');
    }

    public function createSlug($naslov){
        $naslov = strtolower($naslov);

        $naslov = $naslov;

        $naslov = str_replace(' - ', '-', $naslov);
        $naslov = str_replace(' ', '-', $naslov);

        $replace_c = array("č", "ć");
        $naslov = str_replace($replace_c, 'c', $naslov);

        $replace_dj = array("đ", "dž");
        $naslov = str_replace($replace_dj, 'dj', $naslov);

        $naslov = str_replace('ž', 'z', $naslov);

        $naslov = str_replace('š', 's', $naslov);

        return $naslov;
    }

    public function showOrders(){
        $orders = new OrdersServices();
        $orders = $orders->allOrders();

        return view('admin.orders')->with('all_orders', $orders);
    }

    public function showOrder($id){
        $order = new OrdersServices();
        
        $buyer = $order->getOrder($id);
        $qty = unserialize($buyer[0]->proizvodi_ids);
        $products = $order->getProducts(unserialize($buyer[0]->proizvodi_ids));

        return view('admin.order')->with('buyer', $buyer[0])
                                  ->with('qty', $qty)
                                  ->with('products', $products);

    }

    public function deleteOrder($id){
        $order = OrdersServices::deleteOrder($id);

        return redirect("/admin/narudjbe");
    }

    public function orderDone($id){
        OrdersServices::changeStatus($id, 2);

        return redirect('/admin/narudjbe');
    }

    public function setFavorite($id){
        VendorServices::setFavoriteVendor($id);

        return  redirect('/admin/vendors');
    }

    public function removeFavorite($id){
        VendorServices::removeFavoriteVendor($id);

        return  redirect('/admin/vendors');
    }
}
