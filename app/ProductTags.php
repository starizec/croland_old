<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    protected $fillable = [
        'naziv',
    ];

    protected $table = 'product_tags';
}
