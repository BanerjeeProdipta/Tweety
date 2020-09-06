<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user){
        $tweets = auth()->user()->owntimeline();
        return view('profiles.show', compact('user', 'tweets'));
    }
    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        $attributes = request()->validate([
            
            'header' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'bio' => 'string|max:255'
            
        ]);

        if(request('header'))
        {
            $attributes['header'] = request('header')->store('headers');
        }

        if(request('avatar'))
        {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}