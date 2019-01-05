<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;

class TestController extends Controller
{
    //

    public function index()

    {


    	//$user = new User->where('id', 1);
$post =User::orderBy('id', 'desc')->take(5)->get();
echo "<pre>";
    	print_r($post);

    }
}
