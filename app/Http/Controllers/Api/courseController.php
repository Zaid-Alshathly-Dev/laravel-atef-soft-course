<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\courses;
use App\Http\Requests\CreateCourseValidationRequest;
use Illuminate\Http\Request;

class courseController extends Controller
{
 public function index(){
        $data=courses::paginate(6);

        return response()->json([
        'status' => true,
        'courses' => $data
        ],200);
    }


    public function store(CreateCourseValidationRequest $request){
    
    $counter=courses::where('name',$request->name)->count();
    if($counter > 0){
        return response()->json([
            'status'=> false,
            'message' => 'اسم الكورس موجود مسبقا'
        ],422);
    }

    $courses = new courses();
    $courses->name = $request->name;
    $courses->active = $request->active;
    $courses->save();
    

    return response()->json([
            'status'=> true,
            'message' => 'تم اضافه الكورس بنجاح ',
            'data' => $courses
        ],201);
    }

    public function show($id){
    $data = courses::find($id);
    if(!$data){
    return response()->json([
            'status'=> false,
            'message' => 'غير قادر للوصول للبيانات المطلوبه'
        ],404);    
    }
    else{
    return response()->json([
            'status'=> true,
            'data' => $data
        ],200);
    }
}

 public function update(CreateCourseValidationRequest $request, String $id){
        $data=courses::find($id);
        if(!$data){
    return response()->json([
            'status'=> false,
            'message' => 'غير قادر للوصول للبيانات المطلوبه'
        ],404);    
    }

    
            $data->name = $request->name;
            $data->active = $request->active;
            $data->save();
         return response()->json([
            'status'=> true,
            'message' => 'تم تعديل اسم الكورس بنجاح ',
            'data' => $data

        ],200);
            }

            public function destroy(String $id){
                $data=courses::find($id);
                if(empty($data)){
                if(!$data){
    return response()->json([
            'status'=> false,
            'message' => 'غير قادر للوصول للبيانات المطلوبه'
        ],404);    
    }
                
                }
                $data->delete();
                return response()->json([
            'status'=> true,
            'message' => 'تم حذف الكورس بنجاح'
        ],200);
            }

}