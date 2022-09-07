<?php

namespace App\Services;

use App\Regije;

class RegijeService{
    public function all(){
        return Regije::all();
    }

    public function displayRegijeName($vendors){
        $regije = $this->all();

        foreach($vendors as $vendor){
            foreach($regije as $regija){
                if($vendor->id_regije == $regija->id){
                    $vendor->naziv_regije = $regija->naziv;
                }
            }
        }

        return $vendors;
    }
}