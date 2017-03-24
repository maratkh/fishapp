<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $table = 'like_post';
    protected $hidden = ['user_id','post_id','created_at', 'updated_at'];
    public function post ()
    {
        return $this->belongsTo(Post::class,'post_id', 'id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
