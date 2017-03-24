<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
use Illuminate\Support\Facades\Input;

Route::get("/", "HomeController@index");

Route::group(['middleware' => ['web']], function () {

    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts', 'PostController@index');
    Route::post('/posts', 'PostController@store');

    Route::get('/waters', 'WaterController@index');
    Route::get('/waters/create', 'WaterController@create');
    Route::post('/waters', 'WaterController@store');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware'=>'api', 'prefix' => 'api/'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

    Route::resource('post', 'Api\PostController');
    Route::resource('water', 'Api\WaterController');
    Route::resource('user', 'Api\UserController');
    Route::resource('fish', 'Api\FishController');
    Route::post('/file-upload','Api\UploadController@upload');
    //Справочники
    Route::resource('watertype', 'Api\WaterTypeController');
    Route::resource('region', 'Api\RegionController');

});