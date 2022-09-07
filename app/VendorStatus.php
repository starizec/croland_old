<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorStatus extends Model
{
    protected $fillable = [
        'naziv'
    ];

    protected $table = 'vendor_status';
}
