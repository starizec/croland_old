<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use App\VendorSadrzaj;

class VendorController extends Controller
{
    public function getVendor($id){
        $vendor = new Vendors();
        $vendor = $vendor->where('id', $id)->first();

        $sadrzaj = new VendorSadrzaj();
        $sadrzaj = $sadrzaj->where('vendor_id', $id)->orderBy('id', 'asc')->get();

        $slider = array();

        foreach($sadrzaj as $key => $value){
            $ser = @unserialize($value->medij);

            if($ser){
                foreach($ser as $key => $value){
                    $slider[] = $value;
                }
            }else{
                $slider[] = $value->medij;
            }
        }

        

        return view('frontend.vendor')->with('vendor', $vendor)
                                      ->with('sadrzaj', $sadrzaj)
                                      ->with('preporuke', $this->getPreporukeVendora())
                                      ->with('slider', $slider);
    }

    public function getPreporukeVendora(){
        $preporuke_vendora = Vendors::orderByRaw('RAND()')->take(6)->get();


        return $preporuke_vendora;
    }
}
