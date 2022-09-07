<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proizvodi extends Model
{
    protected $fillable = [
        'naziv',
        'opis',
        'galerija',
        'cijena',
        'cijena_popust',
        'vendor_id'
    ];

    protected $table = 'proizvodi';
}
