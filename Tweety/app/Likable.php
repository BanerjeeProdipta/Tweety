<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function setReaction($user, $liked)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function cancleReaction(){
        $this->likes()->delete();
    }

    public function liked($user)
    {
        if($this->isLikedBy($user) == true){
            return $this->cancleReaction();
        }
        else{
            return $this->setReaction($user, true);
        }
    }

    public function disliked($user)
    {
        if($this->isDislikedBy($user) == true){
            return $this->cancleReaction();
        }
        else{
            return $this->setReaction($user, false);
        }
    }
    
}