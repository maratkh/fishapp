<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fish
 * @package App\Models
 * @property string $name
 * @property string $description
 * @property FishType $type
 * @property \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */
class Fish extends Model
{
    protected $filled = ['name', 'description', 'fishtype_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(FishType::class, 'fishtype_id');
    }

    public function waters()
    {
        return $this->belongsToMany(Water::class, 'water_fish', 'fish_id', 'water_id');
    }

    public function posts ()
    {
        return $this->belongsToMany(Post::class,'post_fish', 'fish_id', 'post_id');
    }
}
