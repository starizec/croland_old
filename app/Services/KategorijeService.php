<?php

namespace App\Services;

use App\VendorKategorije as Kategorije;

class KategorijeService{
    public function all(){
        return Kategorije::all();
    }
}