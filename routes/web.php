<?php

use App\Http\Controllers\FlightsController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


route :: get('/',function(){
    return view ('welcame');
    // return ('الحمد لله ');
});

// route::get ('/',function(){
// return 'Zaid Alshathly';
// });


/*route::get ('/zaid/{age?}/{country?}',function($age =21,$country ='yemen'){
    return 'My name is Zaid Alshathly and my age is '.$age .', my country is ' .$country;
    });*/


    // route::get ('/zaid/{name}/{age}',function($name ,$age){
    // return 'welcome mstr '.$name . 'my age is '.$age;
    // })-> where ('name','[A-Z a-z]+')
    // -> where ('age','[0-9]+');

    // route::get ('/zaid/name/{name}',function($name){
    // return 'welcome mstr '.$name;
    // })-> where ('name','[A-Z a-z]+');

    // route::get ('/zaid/age/{age}',function($age){
    // return 'my age is '.$age;
    // })-> where ('age','[0-9]+');
    
    
    // route:: prefix('zaid')->group( function(){
    //     route::get ('/name/{name}',function($name){
    //     return 'welcome mstr '.$name;
    //     })-> where ('name','[A-Z a-z]+');
    
    //     route::get ('/age/{age}',function($age){
    //     return 'my age is '.$age;
    //     })-> where ('age','[0-9]+');
        
    // });


//     route::get('/zaid/hareth/{age}', function($age){
// return 'welcome mstr zaid alshathly , my age is :'.$age;
//     })->name ('hareth');


use App\Http\Controllers\UserController;
use App\Models\Flight;

// route ::get('/zaid', [UserController::class, 'asd']);
// route ::get('/hareth', [UserController::class, 'age']);

// route::get('login', [UserController::class, 'get_login']);
  
// route ::get ('zaid',function(){
//     return view ('loginpage.login',['name' => 'wafa']);
// });
// route ::get ('zaid',function(){
//     return view ('loginpage.login');
// });

// route ::get ('zaid',function(){
//     return view ('loginpage.login',['record' => '1']);
// });

// route::get('main',function(){
//     return view('master');
// });

// route::get('article',function(){
//     return view('article');
// });

// route::get('hi',function(){
//     return "welcome to zaid alshathly";
// });

// route::get('yourname/{name?}',function($name = 'zaid alshathly'){
//     return "welcome to  " . $name;
// });

// route::get('signup',function(){
// return view('signup',['name' => 'zaid alshathly']);
// });

// use App\Http\Controllers\signupController; 

// route::get('signup',[signupController::class , 'get_signup']);


// route::get('page1',function(){
//     return view ('page1');
// });

// route::get('article',function(){
//     return view ('article');
// });

// route::get('hi',function(){
//     return env('APP_URL');
    
// });

// route::get('flights',function(){
//     return Flight::all(); 
    
// });

route::get('flights',[FlightsController::class,'index'])->name('flights');
route::get('create_flights',[FlightsController::class,'create'])->name('create_flights');
route::post('store_flight',[FlightsController::class,'store'])->name('store_flight');

route:: fallback(function(){
    
    return 'sorry this page not found'; 
});