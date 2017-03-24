<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function waters ()
    {
        return $this->hasMany(Water::class);
    }
}
