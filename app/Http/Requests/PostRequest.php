<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Post;
use App\Models\Water;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function getPost ()
    {
        $post = new Post();
        $post->text = $this->get('text');
        $post->rate = $this->get('rate');
        $post->deep = $this->get('deep');
        $post->water_temp = $this->get('water_temp');
        $post->location = $this->get('location');
        $post->water()->associate($this->get('water'));
        $post->user()->associate($this->user());
        return $post;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
