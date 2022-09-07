<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regije extends Model
{
    protected $table = 'regije';

    protected $fillable = [
        'naziv'
    ];
}
