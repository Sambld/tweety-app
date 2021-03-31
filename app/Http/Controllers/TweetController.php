<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // @php-ignore
//        return var_dump( auth()->user()->timeline());
        return view('tweets.index' , [
            'tweets' => auth()->user()->timeline(),

        ]);
    }
    public function store()
    {
        request()->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
