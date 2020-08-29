<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class ProfilesController extends Controller
{
    public function show(User $user){
        $tweets= auth()->user()->timeline();
        return view('profiles.show', compact('user', 'tweets'));
    }
}
