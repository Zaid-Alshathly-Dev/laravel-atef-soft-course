<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dump("6");

class homeController extends Controller
{
   function index(){
    return view('home');
   }
}
