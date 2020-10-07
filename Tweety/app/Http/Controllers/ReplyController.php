<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Tweet;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request, Tweet $tweet)
    {
        $reply = new Reply();
        $validated = request()->validate([
            'body' => 'required|max:255',
        ]);
        $reply->tweet_id = $tweet->id;
        $reply->user_id = auth()->id();
        $reply->body = $request->body;
        $reply->save();
        toastr()->info('Tweet Reply Published');
        $tweet = Tweet::where('id', $tweet->id)
                ->withLikes()
                ->first();
        $replies = $tweet->replies()->latest()->paginate(10);
        return redirect()->back();
    }

    
    public function update(Request $request, Reply $reply)
    {
        //
    }

    
    public function destroy(Reply $reply)
    {
        //
    }
}
