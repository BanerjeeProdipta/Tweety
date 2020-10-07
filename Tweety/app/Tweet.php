<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model 
{
    use Likable;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function likes() { 
        return $this->hasMany(Like::class); 
    }
    
    public function replies(){
        return $this->hasMany(Reply::class); 
    }
}