<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class likeController extends Controller
{
    public function like(Tweet $tweet)
    {
        if ($tweet->isLikedBy(auth()->user())){
            $tweet->like(auth()->user() ,NULL);
        }else{
            $tweet->like(auth()->user() );
        }
        return back();
    }
    public function dislike(Tweet $tweet)
    {
        if ($tweet->isDislikedBy(auth()->user())){
            $tweet->like(auth()->user() ,NULL);
        }else{
            $tweet->dislike(auth()->user() );
        }
        return back();
    }
}
