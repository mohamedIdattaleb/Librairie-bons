<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    function client()
    {
        return $this->belongsTo(Client::class);
    }

    function lignes()
    {
        return $this->hasMany(LigneBon::class);
    }
}
