<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentsRequests;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\CountrieModel;

class StudentsController extends Controller
{
     public function index(){
        $data=Students::all();
         if(!empty($data)){
            foreach($data as $info){
                $info->country_name=CountrieModel::where('id','=',$info->country_id)->value('name');
            }
        }
        return view('students.index',[ 'data' => $data ]);
    }

    public function create(){

    $counter=CountrieModel::select('id', 'name')->where('active',1)->get();
        return view('students.create', ['CountrieModel' => $counter]);
    }


    public function store(CreateStudentsRequests $request){
    $counter=Students::where('name',$request->name)->count();
    if($counter > 0){
        return redirect()->back()->with('error', 'اسم الطالب موجود مسبقا');
    }

    $Student = new Students();
    $Student->name = $request->name;
    $Student->active = $request->active;
    $Student->country_id = $request->country_id;
    $Student->phone = $request->phone;
    $Student->national_id = $request->national_id;
    $Student->notes = $request->notes;
    $Student->address = $request->address;
     if($request->has('photo')){
        $image=$request->photo;
        $extension=strtolower($image->extension());
        $imageName=time().'.'.$extension;
        $image->move("uploads",$imageName);
        $Student->image=$imageName;
     }
    $Student->save();

        return redirect()->route('students.index')->with('success', 'تم اضافة بيانات الطالب بنجاح');

    }


     public function edit(String $id){
        $data=Students::find($id);
        if(empty($data)){
        return redirect()->route('students.index')->with('error', 'الطالب غير موجود');

        }
        $counter=CountrieModel::select('id', 'name')->where('active',1)->get();

        return view('students.edit', ['data' => $data, 'CountrieModel' => $counter]);
    }


    public function update(CreateStudentsRequests $request, String $id){
        $data=Students::find($id);
        if(empty($data)){
            return redirect()->route('students.index')->with('error', 'الطالب غير موجود');
            
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
            return redirect()->route('students.index')->with('success', 'تم تعديل بيانات الطالب بنجاح');
            }


            public function destroy(String $id){
                $data=Students::find($id);
                if(empty($data)){
                return redirect()->route('students.index')->with('error', 'الطالب غير موجود');
                
                }
                $data->delete();
                return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح');
            }




}
