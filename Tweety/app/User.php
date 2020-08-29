<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function timeline(){
       $ids = $this->follows()->pluck('id');
       $ids->push($this->id);
       return Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function getAvatarAttribute(){
        return "https://i.pravatar.cc/200?u=.$this->email";
    }

    // // user friendly in url for older version of laravel
    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

}
