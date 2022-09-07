<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProizvodiKategorije extends Model
{
    protected $fillable = [
        'naziv',
        'image'
    ];

    protected $table = 'proizvodi_kategorije';
}
