<?php

namespace App\Http\Controllers\api;

use App\Models\ImagePost;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    protected $destinationPath = 'upload/';
    public function Upload (Request $request )
    {

        $post_id = $request->get('post_id');
        $image_for = $request->get('image_for');

        //I am storing the image in the public/images folde
        $newImageName=$image_for.'_'.$post_id.'_'.Carbon::now()->timestamp.'_'.rand(1000,9999).'.jpg';

        //Rename and move the file to the destination folder
        Input::file('file')->move($this->destinationPath,$newImageName);
        $image = new ImagePost();
        $image->src = $newImageName;
        $image->post_id = $post_id;
        $image->save();

    }
}
