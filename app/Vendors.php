<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $fillable = [
        'slug',
        'naziv',
        'naslovna_slika',
        'youtube_link',
        'adresa',
        'icone',
        'mjesto',
        'postanski_broj',
        'oib',
        'opis',
        'lokacija',
        'email',
        'telefon',
        'favorite'
    ];

    protected $table = 'vendors';
}
