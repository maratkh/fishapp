<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishType extends Model
{
    protected  $filled = ['name', 'description'];

    public function fishs()
    {
        return $this->hasMany(Fish::class, 'fishtype_id');
    }
}
