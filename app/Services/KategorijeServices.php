<?php

namespace App\Services;

use App\VendorKategorije as Kategorije;

class KategorijeServices
{
    public function all(){
        return Kategorije::all();
    }
}