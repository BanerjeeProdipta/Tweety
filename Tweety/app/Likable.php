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


    public function like($user, $liked)
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
    public function liked($user)
    {
        return $this->like($user, true);
    }

    public function disliked($user)
    {
        return $this->like($user, false);
    }
    
    
}