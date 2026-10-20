<?php

namespace App\Http\Controllers;

use App\Services\HelperService;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Facades\HelperFacade;
use Illuminate\Support\Facades\Route;



class wellcomeController extends Controller
{

public function index(HelperService $helper){

// $helper = App::make('helper');

return $helper->greet('زيد حارث الشاذلي ');

}

public function myfacade(){

return HelperFacade::greet(' زيد حارث  ');
}


public function getmyrouteinfo(string $username){
    $name = Route::currentRouteName();
    $action= Route::currentRouteAction();
    $para= Route::current()->parameters();

return "
Route Name :{$name} <br>,
Route Action :{$action} <br>,
Route Parameters : " .json_encode($para);  
}
}
