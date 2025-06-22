<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function bons()
    {
        return $this->hasMany(Bon::class);
    }
}
