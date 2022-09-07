<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProizvodKategorija extends Model
{
    protected $fillable = [
        'id_kategorije',
        'id_proizvoda'
    ];

    protected $table = 'proizvod_kategorija';
}
