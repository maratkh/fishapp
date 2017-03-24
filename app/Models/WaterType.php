<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterType extends Model
{
    protected $filled = ["name"];
    public function waters ()
    {
        return $this->hasMany(Water::class);
    }
}
