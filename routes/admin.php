<?php

use Illuminate\Support\Facades\Route;

route::prefix('admin')->group(function(){
Route::get('/hi',function(){
    return "welcome to zaid alshathly admin";
});
});



?>
