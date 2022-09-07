<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorKategorije extends Model
{
    protected $fillable = [
        'naziv'
    ];

    protected $table = 'vendor_kategorije';
}
