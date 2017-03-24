<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $table = 'comment_post';

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id', 'id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
