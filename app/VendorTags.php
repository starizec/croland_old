<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorTags extends Model
{   
    protected $table = 'vendor_tags';

    protected $fillable = [
        'vendor_id', 'tag_id'
    ];
}
