<?php

namespace App\Services;

use App\Vendors;
use App\VendorSadrzaj;
use App\VendorTags;
use App\KategorijeVendora;
use App\Proizvodi;
use App\ProizvodKategorija;
use App\ProizvodiSlike;

class VendorServices
{
    static function setFavoriteVendor($id){
        Vendors::where('id', $id)->update(array('favorite' => 1));
    }

    static function removeFavoriteVendor($id){
        Vendors::where('id', $id)->update(array('favorite' => 0));
    }

    static function getFavoriteVendors(){
        return Vendors::where('favorite', 1)->get();
    }

    static function removeVendor($id){
        Vendors::where('id', $id)->delete();
        VendorSadrzaj::where('vendor_id', $id)->delete();
        VendorTags::where('vendor_id', $id)->delete();
        KategorijeVendora::where('id_vendora', $id)->delete();

        $proizvodi = Proizvodi::where('vendor_id', $id)->get();

        foreach($proizvodi as $proizvod){
            Proizvodi::where('id', $proizvod->id)->delete();
            ProizvodKategorija::where('id_proizvoda', $proizvod->id)->delete();
            ProizvodiSlike::where('id_proizvoda', $proizvod->id)->delete();
        }
    }
}