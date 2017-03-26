<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

/**
 * Class ImagePost
 * @package App\Models
 * @property string $src
 * @property int $id
 */
class ImagePost extends Model
{
    protected $table='post_image';
    protected $hidden = ['created_at', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function getSrcAttribute($value)
    {
        return Config::get('app.url')."/upload/".($value);
    }
}
