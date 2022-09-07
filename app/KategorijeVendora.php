<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategorijeVendora extends Model
{
    protected $fillable = [
        'id_kategorije',
        'id_vendora'
    ];

    protected $table = 'kategorije_vendora';
}
