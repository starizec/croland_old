<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProizvodiSlike extends Model
{
    protected $fillable = [
        'id_proizvoda',
        'slika'
    ];

    protected $table = 'slike_proizvoda';
}
