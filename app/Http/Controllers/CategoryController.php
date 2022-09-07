<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use App\KategorijeVendora;
use App\VendorSadrzaj;
use DB;

class CategoryController extends Controller
{
    public function index($id){
        $vendors_cat = KategorijeVendora::where('id_kategorije', $id)->get();

        $vendors_cat = json_decode($vendors_cat,true);
        $vendors_cat = array_column($vendors_cat, 'id_vendora');
        $vendors_cat = array_unique($vendors_cat);

        $vendors = Vendors::whereIn('id', $vendors_cat)->get();

        foreach($vendors as $vendor){
            $ext = explode('.', $vendor->naslovna_slika);

            if($ext[1] != 'jpg'){
                $sadrzaj_vendora[$vendor->id] = VendorSadrzaj::where('vendor_id', $vendor->id)->first();
            }
        }

        return view('frontend.kategorije')->with('vendors', $vendors)
                                          ->with('sadrzaj_vendora', @$sadrzaj_vendora);
    }
}
