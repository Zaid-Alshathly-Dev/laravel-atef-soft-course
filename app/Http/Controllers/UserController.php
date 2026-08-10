<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function asd(){
        return view ('welcome'); 
        // return 'welcome to my first controller';
        }

    public function age(){
        return 'welcome mstr zaid alshathly , my age is 21';
    }

    public function get_login(){
        return view ('loginpage.login');
    }
}
