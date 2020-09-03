<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function like(Tweet $tweet)
    {
        $tweet->liked(auth()->user());

        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->disliked(auth()->user());

        return back();
    }    
}
