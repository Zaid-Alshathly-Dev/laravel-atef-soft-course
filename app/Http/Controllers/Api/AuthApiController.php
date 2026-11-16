<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
public function register(RegisterRequest $request){
    $user =User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' =>Hash::make($request->password)
    ]);
    $data['token'] = $user->createToken('ApiRegister')->plainTextToken;
    $data['name'] = $request->name;
    $data['email'] = $request->email;


    return ApiResponse::sendApi(201,true,'تم انشاء الحساب بنجاح وتم تسجيل الدخول ',$data);

}

public function login(LoginRequest $request){
    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        $user = Auth::user();
        $data['token'] = $user->createToken('ApiLogin')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::sendApi(200,true,'تم تسجيل الدخول بنجاح ',$data);
}else{
        return ApiResponse::sendApi(401,false,'بيانات الدخول غير صحيحة','');
    }
}

public function logout(Request $request){
    $request->user()->currentAccessToken()->delete();
    return ApiResponse::sendApi(200,true,'تم تسجيل الخروج بنجاح','');
}

}
