<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProizvodiTags extends Model
{
    protected $fillable = [
        'proizvod_id',
        'tag_id'
    ];

    protected $table = 'proizvodi_tags';
}
