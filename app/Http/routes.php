<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});


Route::group(['prefix' => 'api'], function () {
    Route::resource("posts", 'PostsController', ['except' => ['create', 'edit']]);
});


//  Everything else is redirected to homepage and than can be handled by vue-router
Route::any('{path?}', function () {
    return view("app");
})->where("path", ".+");