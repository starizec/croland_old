<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'ime',
        'prezime',
        'telefon',
        'email',
        'adresa',
        'postanski_broj',
        'mjesto',
        'proizvodi_ids',
        'napomene'
    ];

    protected $table = 'orders';
}
