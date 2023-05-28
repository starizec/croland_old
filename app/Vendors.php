<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
    protected $fillable = [
        'naziv',
        'naslovna_slika',
        'adresa',
        'mjesto',
        'postanski_broj',
        'oib',
        'opis',
        'lokacija',
        'email',
        'telefon'
    ];

    protected $table = 'vendors';
}
