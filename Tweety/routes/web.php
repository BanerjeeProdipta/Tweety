<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group( function() {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');
    Route::post('/profile/{user:username}/follow', 'FollowsController@store');
    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit')->middleware('can:update,user');
    Route::patch('/profile/{user:username}', 'ProfilesController@update')->middleware('can:update,user');
    Route::get('/explore', 'ExploreController@index')->name('explore');


});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();