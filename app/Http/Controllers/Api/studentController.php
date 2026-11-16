<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentsRequests;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\CountrieModel;
use App\Traits\GeneralTraits;
use App\Models\User;
use App\Notifications\CreateStudent;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
public function index(){
        // $this->zaid_soft();
        session()->put('locale','ar');
        $data=Students::paginate(4);
         if(!empty($data)){
            foreach($data as $info){
                $info->country_name=CountrieModel::where('id','=',$info->country_id)->value('name');
            }
        }
        return response()->json([
            'status'=> true,
            'data' => $data
        ],200);
    }



    public function store(CreateStudentsRequests $request){
        try{
    $counter = Students::where('name', $request->name)->count();
    if($counter > 0){
        return response()->json([
                'status'=> false,
                'message' => 'اسم الطالب موجود مسبقا'
            ],422);
    }

    $Student = new Students();
    $Student->name = $request->name;
    $Student->active = $request->active;
    $Student->country_id = $request->country_id;
    $Student->phone = $request->phone;
    $Student->national_id = $request->national_id;
    $Student->notes = $request->notes;
    $Student->address = $request->address;

    

    $Student->save();
    return response()->json([
        'status' => true,
        'messsage' => 'تم تسجيل البيانات بنجاح ',
        'data' => $Student
    ],201);

        }catch(\Exception $ex){
        return response()->json([
            'status'=>false,
            'message'=> 'عفوا حدث خطا اما ',
            'error' => $ex->getMessage()


        ]);
        }
    
}

public function update(CreateStudentsRequests $request, String $id){
        $data=Students::find($id);
        if(empty($data)){
            return response()->json([
                'status'=> false,
                'message' => 'غير قادر للوصول للبيانات المطلوبه'
            ],404);
            }
        $counter=Students::where('name',$request->name)->where('id','!=',$id)->count();
        if($counter > 0){
            return redirect()->back()->with('error', 'اسم الطالب موجود مسبقا');
            }
            $data->name = $request->name;
            $data->active = $request->active;
            $data->country_id = $request->country_id;
            $data->phone = $request->phone;
            $data->national_id = $request->national_id;
            $data->notes = $request->notes;
            $data->address = $request->address;

            if($request->has('photo')){
            $image=$request->photo;
            $extension=strtolower($image->extension());
            $imageName=time().'.'.$extension;
            $image->move("uploads",$imageName);
            $data->image=$imageName;
        
            }

            $data->save();
            return response()->json([
                'status'=> true,
                'message' => 'تم تعديل بيانات الطالب بنجاح',
                'data' => $data
                  
            ],200);
                }



public function destroy(String $id){
    $data=Students::find($id);
            if(empty($data)){
                return response()->json([
                    'status'=> false,
                    'message' => 'غير قادر للوصول للبيانات المطلوبه'
                ],404);
                
                }
            $data->delete();
            return response()->json([
                'status'=> true,
                'message' => 'تم حذف الطالب بنجاح'
            ],200);
            }



}
