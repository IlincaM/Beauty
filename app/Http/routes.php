<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PagesController@getIndex');
Route::get('about-me', 'PagesController@getAboutMe');
Route::resource('posts','PostController');
Route::get('blog/{slug}', ['as' =>'blog/single', 'uses' => 'BlogController@getSingle' ])->where('slug','[\w\d\-\_]+');
Route::get('fabulous-hair', 'BlogController@getIndexHair');
Route::get('makeup-art', 'BlogController@getIndexMakeUp');
Route::get('nails-art', 'BlogController@getIndexNails');
//Comments

Route::post('comments/{post_id}',['uses' =>'CommentsController@store', 'as' =>'comments.store']);
    
// Authentication routes...
Route::get('auth/login', ['as' => 'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('logout',['as' => 'logout','uses'=>'Auth\AuthController@getLogout'] );

// Registration routes...
Route::get('auth/register', ['as' => 'register','uses'=>'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'admin'], function()
{
    Route::resource('posts','PostController');
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as'=>'comments.edit']);
    Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as'=>'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as'=>'comments.delete']);
    Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as'=>'comments.update']);

});