<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    function get_signup(){
        return view('signup');
    }
}
