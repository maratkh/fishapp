<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Http\Requests;

class PostController extends Controller
{
    public function  __construct ()
        {
            $this->middleware('auth');
        }
    public function index ()
    {
        $posts = Post::all();
        return view("post.index", compact('posts'));
    }

    public function create ()
    {
        return view("post.create");
    }

    public function store(PostRequest $request)
    {
        $request->getPost()->save();
        //$request->user()->post()->create($request->all());
        return redirect("posts");
    }
}
