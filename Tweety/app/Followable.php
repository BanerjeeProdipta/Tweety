<?php

namespace App;

trait Followable
{
    //follow a user
    public function follow(User $user){
        return $this->follows()->attach($user);
    }

    //follow a user
    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user){
        // if( $this->following($user) ){
        //     return $this->unfollow($user);
        // }
        // return $this->follow($user);  
        $this->follows()->toggle($user);
    }

    // check if the user is following other user
    public function following(User $user){
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    // people that the user follows
    public function follows(){
        return $this->belongsToMany(User::class, 'follows','user_id', 'following_user_id');
    }
}