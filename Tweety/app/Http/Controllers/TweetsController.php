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

    public function store()
    {
        $validated = request()->validate([
            'body' => 'required|max:255'
        ]);
        auth()->user()->tweets()->create($validated);

        return redirect('/tweets');
    }
}