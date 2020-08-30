<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user){
        $this->validate('follow', $user);
        auth()->user()->toggleFollow($user);
        return back();
    }
}
