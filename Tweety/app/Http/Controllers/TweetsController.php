<?php

namespace App\Http\Controllers;
use App\Tweet;
use App\User;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', compact('tweets'));
    }

    public function show(User $user, Tweet $tweet)
    {   $tweet = Tweet::where('id', $tweet->id)
                ->withLikes()
                ->first();;
        return view('tweets.show', compact('tweet'));
    }

    public function store()
    {
        $validated = request()->validate([
            'body' => 'required|max:255'
        ]);
        auth()->user()->tweets()->create($validated);
        toastr()->info('Tweet Published');
        return redirect('/tweets');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect('/tweets');
    }
}