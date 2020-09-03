<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group( function() {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@like');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@dislike');
    Route::post('/profile/{user:username}/follow', 'FollowsController@store');
    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit')->middleware('can:update,user');
    Route::patch('/profile/{user:username}', 'ProfilesController@update')->middleware('can:update,user');
    Route::get('/explore', 'ExploreController@index')->name('explore');

});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();