<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_courses;
use App\Models\courses;
use App\Http\Requests\CreateTrainingRequest; 

class Training_courses_Controller extends Controller
{
     public function index(){
        $data=Training_courses::all();
         if(!empty($data)){
            foreach($data as $info){
                $info->course_name=courses::where('id','=',$info->course_id)->value('name');
            }
        }
        return view('training_courses.index',[ 'data' => $data ]);
    }

    public function create(){

    $courses=courses::select('id', 'name')->where('active',1)->get();
        return view('training_courses.create', ['courses' => $courses]);
    }

    public function store(CreateTrainingRequest $request){
    $training = new Training_courses();
    $training->course_id   = $request->course_id  ;
    $training->start_date = $request->start_date;
    $training->end_date = $request->end_date;
    $training->price = $request->price;
    $training->notes = $request->notes;
    $training->save();

        return redirect()->route('training_courses.index')->with('success', 'تم اضافة بيانات الكورس بنجاح');

    }


     public function edit(String $id){
        $data=Training_courses::find($id);
        if(empty($data)){
        return redirect()->route('training_courses.index')->with('error', 'الكورس غير موجود');

        }
        $courses=courses::select('id', 'name')->where('active',1)->get();

        return view('training_courses.edit', ['data' => $data, 'courses' => $courses]);
    }

    public function update(CreateTrainingRequest $request, String $id){
        $data=Training_courses::find($id);
        if(empty($data)){
            return redirect()->route('training_courses.index')->with('error', 'الكورس غير موجود');
            
            }
        
            $data->course_id = $request->course_id;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->price = $request->price;
            $data->notes = $request->notes;

            $data->save();
            return redirect()->route('training_courses.index')->with('success', 'تم تعديل بيانات الكورس بنجاح');
            }


            public function destroy(String $id){
                $data=Training_courses::find($id);
                if(empty($data)){
                return redirect()->route('training_courses.index')->with('error', 'الكورس غير موجود');
                
                }
                $data->delete();
                return redirect()->route('training_courses.index')->with('success', 'تم حذف الكورس بنجاح');
            }


}
