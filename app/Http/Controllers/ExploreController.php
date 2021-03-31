<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    public function index()
    {

            $users = User::all()->except(2)->toQuery()->paginate();


        return view('explore' , compact('users'));
    }
}
