<?php

namespace App;

use App\Models\CommentPost;
use App\Models\LikePost;
use App\Models\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'created_at', 'updated_at'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function commentPosts ()
    {
        return $this->hasMany(CommentPost::class,'user_id', 'id');
    }
    public function likePosts ()
    {
        return $this->hasMany(LikePost::class, 'user_id', 'id');
    }

}
