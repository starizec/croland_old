<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use App\VendorSadrzaj;

class RegijeController extends Controller
{
    public function index($id){
        $vendors = Vendors::where('id_regije', $id)->get();
        $naslovna = Vendors::where('id_regije', $id)->orderByRaw('RAND()')->take(1)->get();

        foreach($vendors as $vendor){
            $ext = explode('.', $vendor->naslovna_slika);

            if($ext[1] != 'jpg'){
                $sadrzaj_vendora[$vendor->id] = VendorSadrzaj::where('vendor_id', $vendor->id)->first();
            }else{
                $sadrzaj_vendora = null;
            }
        }

        return view('frontend.regija')->with('vendors', $vendors)
                                      ->with('naslovna', $naslovna[0])
                                      ->with('id_regije', $id)
                                      ->with('sadrzaj_vendora', $sadrzaj_vendora);
    }
}
