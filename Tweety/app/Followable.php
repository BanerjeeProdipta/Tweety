<?php

namespace App;

trait Followable
{
    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function following(){
        
    }

    // people that the user follows
    public function follows(){
        return $this->belongsToMany(User::class, 'follows','user_id', 'following_user_id');
    }
}