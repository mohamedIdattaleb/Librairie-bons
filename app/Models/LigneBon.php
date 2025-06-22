<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneBon extends Model
{
    public function bon()
    {
        return $this->belongsTo(Bon::class);
    }
}
