<?php

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\courseController;
use App\Http\Controllers\Api\studentController;
use App\Http\Controllers\Api\AuthApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


route::get('/students_from_api',function(){
return response()->json([
    'students' => Students::all()
]);         
});


// اولا api manual 
route::prefix('v1')->group(function(){
route::get('/course_from_api_manual', [courseController::class,'index']);
route::post('/course_store', [courseController::class,'store']);
route::get('/course_show/{id}', [courseController::class,'show']);
route::post('/course_update/{id}', [courseController::class,'update']);
route::get('/course_destroy/{id}', [courseController::class,'destroy']);


// ثانيا بشكل تلقائي 
route::apiResource('student',studentController::class);

// auth route
route::post('/register',[AuthApiController::class,'register']);
route::post('/login',[AuthApiController::class,'login']);
route::post('/logout',[AuthApiController::class,'logout'])->middleware('auth:sanctum');


route::middleware('auth:sanctum')->group(function(){
route::get('/course_from_api_manual_authApi', [courseController::class,'index']);

});
});