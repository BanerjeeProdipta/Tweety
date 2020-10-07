<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group( function() {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::delete('/tweets/{tweet}', 'TweetsController@destroy')->middleware('can:delete,tweet');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@like');
    Route::post('/tweets/{tweet}/dislike', 'TweetLikesController@dislike');
    Route::post('{user:username}/follow', 'FollowsController@store');
    Route::get('{user:username}/edit', 'ProfilesController@edit')->middleware('can:update,user');
    Route::patch('{user:username}', 'ProfilesController@update')->middleware('can:update,user');
    Route::get('{user:username}/notification', 'TweetLikesController@index');
    Route::get('/explore', 'ExploreController@index')->name('explore');
    Route::get('settings/{user:username}/edit', 'ProfileSettingsController@edit');
    Route::patch('settings/{user:username}', 'ProfileSettingsController@update');
    Route::get('{user:username}/status/{tweet}', 'TweetsController@show');
    
});

Route::get('{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();