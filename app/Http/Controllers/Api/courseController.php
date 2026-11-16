<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\courses;
use App\Http\Requests\CreateCourseValidationRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CoursesResource;
use App\Helpers\ApiResponse;

class courseController extends Controller
{
 public function index(){
        $data=courses::paginate(6);

        // return response()->json([
        // 'status' => true,
        // 'courses' => $data
        // ],200);

        // return response()->json([
        // 'status' => true,
        // 'courses' => CoursesResource::collection($data) 
        // ],200);

        // اذا بنشتغل بapi schema
        return ApiResponse::sendApi(200,true,'تم جلب البيانات بنجاح',CoursesResource::collection($data));
    }


    public function store(CreateCourseValidationRequest $request){
    
    $counter=courses::where('name',$request->name)->count();
    if($counter > 0){
        // return response()->json([
        //     'status'=> false,
        //     'message' => 'اسم الكورس موجود مسبقا'
        // ],422);
        return ApiResponse::sendApi(422,false,'اسم الكورس موجود مسبقا','','اسم الكورس موجود مسبقا');
    }

    $courses = new courses();
    $courses->name = $request->name;
    $courses->active = $request->active;
    $courses->save();
    

    // return response()->json([
    //         'status'=> true,
    //         'message' => 'تم اضافه الكورس بنجاح ',
    //         'data' => $courses
    //     ],201);

     // اذا بنشتغل بapi schema
        return ApiResponse::sendApi(201,true,'تم إضافة الكورس بنجاح',$courses);
    


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
    return new CoursesResource($data);
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