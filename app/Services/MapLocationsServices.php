<?php

namespace App\Services;

use App\Vendors as Vendors;

class MapLocationsServices{
    public function all($id_regije){

        $vendors = Vendors::all();
        
        $mapLocations = [];
        
        foreach($vendors as $vendor){
            $mapLocations[] = '{
                "type": "Feature",
                "geometry": {
                  "type": "Point",
                  "coordinates": [
                      '.$vendor->lon.',
                      '.$vendor->lat.'
                  ]
                },
                "properties": {
                  "naziv": "'.base64_decode($vendor->naziv).'",
                  "address": "'.base64_decode($vendor->adresa).', '.base64_decode($vendor->mjesto).'",
                  "id": "'.$vendor->id.'"
                }
              },';
        }

        return $mapLocations;
    }
}