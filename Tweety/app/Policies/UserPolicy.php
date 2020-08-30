<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $user)
    {
        // return auth()->user()->is($user);
        dd($user);
    }
    public function follow(User $user)
    {
        return auth()->user()->isNot($user);
    }
}