<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;



class ProfileSettingsController extends Controller
{
    public function edit(User $user){
        return view('profiles.settings', compact('user'));
    }
    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => ['string', 'required', 'max:255'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);
        
        $user->update($attributes);
        $password = request()->password;
        $password = Hash::make($password);
        $user->update(['password'=> $password]);
        return redirect($user->path());
    }

}
