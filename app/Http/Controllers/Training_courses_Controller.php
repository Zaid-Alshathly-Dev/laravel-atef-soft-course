<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_courses;
use App\Models\courses;
use App\Http\Requests\CreateTrainingRequest; 
use App\Models\training_courses_enrolments;
use App\Models\Students;    
use App\Http\Requests\DoAddStudentToCourse;

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
            
            public function details(String $id){
                $data=Training_courses::find($id);
                if(empty($data)){
                    return redirect()->route('training_courses.index')->with('error', 'الطالب غير موجود');
                
                }
                $data['course_name']=courses::where('id','=',$data['course_id'])->value('name');
                $data['student_counter']=training_courses_enrolments::where('training_course_id','=',$id)->count();
                $training_courses_enrollments=training_courses_enrolments::select("*")->where('training_course_id','=',$id)->get();
                if(!empty($training_courses_enrollments)){
                    foreach($training_courses_enrollments as $info){
                    $info->student_name=Students::where('id','=',$info->student_id)->value('name');
                    }
                }
                
                return view('training_courses.details', ['data' => $data ,'training_courses_enrollments'=>$training_courses_enrollments]);
                }

                public function addStudent(String $id){
                    
                $data=Training_courses::find($id);
                if(empty($data)){
                    return redirect()->route('training_courses.index')->with('error', 'الطالب غير موجود');
                    }
                
                $students = Students::select('id', 'name')->where('active', 1)->get();
        return view('Training_courses.addStudent', ['students' => $students],['data'=>$data]);
        }
        
        public function DOaddStudent(DoAddStudentToCourse $request, String $id){
            
            $data=Training_courses::find($id);
            if(empty($data)){
                return redirect()->route('training_courses.index')->with('error', 'الطالب غير موجود');
                }
                $student_counter=training_courses_enrolments::where('training_course_id','=',$id)->where('student_id','=',$request->student_id)->count();
                if($student_counter > 0){
                    return redirect()->back()->with('error', 'الطالب موجود مسبقا في هذه الدورة');
                    }
                    $dataToInsert=[
                        'student_id' => $request->student_id,
                        'training_course_id' => $id,
                        'enrolments_date' => $request->enrolment_date,
                        ];
                        training_courses_enrolments::create($dataToInsert);
                    return redirect()->route('training_courses.details',$id)->with('success', 'تم اضافة الطالب بنجاح الي الدورة التدريبية');
        }


        public function DeletStudent(String $id){
            $data_training_courses_enrolments=training_courses_enrolments::find($id);
            if(empty($data_training_courses_enrolments)){
            return redirect()->route('training_courses.index')->with('error', 'الكورس غير موجود');
            
            }
            $data_training_courses_enrolments->delete();
            return redirect()->route('training_courses.details',$data_training_courses_enrolments['training_course_id'])->with('success', 'تم حذف الطالب بنجاح');
        }
}




