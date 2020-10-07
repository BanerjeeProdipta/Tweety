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
        'username', 'name', 'header', 'avatar', 'bio', 'email', 'password',
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

    public function timeline()
    {
        $following = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(50);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function getAvatarAttribute($value){
        return asset($value ? 'storage/'.$value : 'images/default-avatar.jpeg');    
    }

    public function getHeaderAttribute($value){
        return asset($value ? 'storage/'.$value : 'images/header.jpg');    
    }
    
    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $path;
        // return $append ? "{$path}/{$append}" : $path;
    }
}
