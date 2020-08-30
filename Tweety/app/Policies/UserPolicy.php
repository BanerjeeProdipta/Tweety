<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $model)
    {
        return auth()->user()->is($model);
    }
    public function follow(User $user, User $model)
    {
        return auth()->user()->isNot($model);
    }

}
