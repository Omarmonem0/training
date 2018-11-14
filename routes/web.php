<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// OAuth
Route::get('login/facebook', 'AuthController@redirectToProvider');
Route::get('login/facebook/callback', 'AuthController@handleProviderCallback');

//posts
Route::Resource('posts', 'PostController');
//likes
Route::get('/like/store/{post}/{type}', 'LikesController@store')->name('like.store');
//profile
Route::post('profile/edit', 'ProfileController@update')->name('profile.update');

Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::get('profile/show', 'ProfileController@show')->name('profile.show');