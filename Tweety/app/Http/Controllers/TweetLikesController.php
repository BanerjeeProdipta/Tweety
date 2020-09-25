<?php

namespace App\Http\Controllers;

use App\Like;
use App\Notifications\TweetDislike;
use App\Notifications\TweetLike;
use App\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function index()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;
        return view('profiles.notification', [
            'unreadNotifications' => $unreadNotifications,
            'readNotifications' => $readNotifications,
        ]);
    }
    public function like(Tweet $tweet)
    {
        $tweet->liked(auth()->user());
        $tweet->user->notify(new TweetLike($tweet->id, $tweet->body, auth()->user()->name));
        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->disliked(auth()->user());
        $tweet->user->notify(new TweetDislike($tweet->id, $tweet->body, auth()->user()->name));
        return back();
    }    
}
