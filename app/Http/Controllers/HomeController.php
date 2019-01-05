<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users_id = auth()->user()->id;

        $user =User::find($users_id);

        /* here we are accessing the posts method which is inside the user model */
        return view('home')->with('post', $user->posts);
    }
}
