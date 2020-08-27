<?php

namespace App\Http\Controllers;
use App\Tweet;

class TweetsController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'body' => 'required|max:255'
        ]);
        auth()->user()->tweets()->create($validated);

        return redirect('/home');
    }
}