<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//api/posts;
Route::get('/posts','PostsController@index');
Route::get('/posts/{post}','PostsController@show');
Route::post('/register','Auth\RegisterController@register');

Route::post('/login','Auth\LoginController@login');

Route::get('/test1','TestController@test1');
Route::get('/test','TestController@test');
Route::post('/post','TestController@post');
Route::get('/post1','TestController@post1');
