<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorSadrzaj extends Model
{
    protected $fillable = [
        'naslov',
        'sadrzaj',
        'medij',
    ];

    protected $table = 'vendor_sadrzaj';
}
