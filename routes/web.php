<?php

use App\Http\Controllers\CountiesController;
use App\Http\Controllers\FlightsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Training_courses_Controller;
/*Route::get('/', function () {
    return view('welcome');
});*/


route :: get('/', [homeController::class,'index'])->name('home');

// route::get ('/',function(){
// return 'Zaid Alshathly';
// });

// route::get('hi',function(){
    
// })->middleware('PoliceMan');

route::get('ar',function(){
session()->put('locale','ar');
return redirect()->back();
})->name('ar');



route::get('en',function(){
    session()->put('locale','en');
    return redirect()->back();
    
})->name('en');


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
route::get('edit_flights/{id}',[FlightsController::class,'edit'])->name('edit_flights');
route::post('update_flights/{id}',[FlightsController::class,'update_flights'])->name('update_flights');
route::get('delete_flights/{id}',[FlightsController::class,'delete'])->name('delete_flights');
route::get('delete_soft/{id}',[FlightsController::class,'delete_soft'])->name('delete_soft');
route::get('restore/{id}',[FlightsController::class,'restore'])->name('restore');


// start courses routes
route::get('courses',[CourseController::class,'index'])->name('courses.index');
route::get('create_courses',[CourseController::class,'create'])->name('courses_create');
route::post('store_courses',[CourseController::class,'store'])->name('courses_store');
route::get('edit_courses/{id}',[CourseController::class,'edit'])->name('courses_edit');
route::post('update_courses/{id}',[CourseController::class,'update'])->name('courses_update');
route::get('destroy_courses/{id}',[CourseController::class,'destroy'])->name('courses_destroy');



// start Student routes
route::get('students',[StudentsController::class,'index'])->name('students.index');
route::get('create_students',[StudentsController::class,'create'])->name('students_create');
route::post('store_students',[StudentsController::class,'store'])->name('students_store');
route::get('edit_students/{id}',[StudentsController::class,'edit'])->name('students_edit');
route::post('update_students/{id}',[StudentsController::class,'update'])->name('students_update');
route::get('destroy_students/{id}',[StudentsController::class,'destroy'])->name('students_destroy');
route::post('ajax_search_students',[StudentsController::class,'ajax_search_students'])->name('students.ajax_search');

// start training courses routes
route::get('training_courses',[Training_courses_Controller::class,'index'])->name('training_courses.index');
route::get('create_training_courses',[Training_courses_Controller::class,'create'])->name('training_courses.create');
route::post('store_training_courses',[Training_courses_Controller::class,'store'])->name('training_courses.store');
route::get('edit_training_courses/{id}',[Training_courses_Controller::class,'edit'])->name('training_courses.edit');
route::post('update_training_courses/{id}',[Training_courses_Controller::class,'update'])->name('training_courses.update');
route::get('destroy/{id}',[Training_courses_Controller::class,'destroy'])->name('training_courses.destroy');
route::get('details_training_courses/{id}',[Training_courses_Controller::class,'details'])->name('training_courses.details');
route::get('addStudentTo_details_training_courses/{id}',[Training_courses_Controller::class,'addStudent'])->name('training_courses.add_student');
route::post('DOaddStudentTo_details_training_courses/{id}',[Training_courses_Controller::class,'DOaddStudent'])->name('training_courses.DOadd_student');
route::get('DeletStudentFrom_training_courses/{id}',[Training_courses_Controller::class,'DeletStudent'])->name('training_courses.Delet_student');


Route::resource('country',CountiesController::class);
// Route::resource('country',CountiesController::class)->except(['create']);
// Route::resource('country',CountiesController::class)->only(['create']);

route:: fallback(function(){
    
    return 'sorry this page not found'; 
});