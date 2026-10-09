<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Http\Requests\CreateCourseValidationRequest;

class courseController extends Controller
{
    public function index(){
        $data=courses::all();

        return view('courses.index',[ 'data' => $data ]);
    }

    public function create(){
        return view('courses.create');
    }

    public function store(CreateCourseValidationRequest $request){
    $counter=courses::where('name',$request->name)->count();
    if($counter > 0){
        return redirect()->back()->with('error', 'اسم الكورس موجود مسبقا')->withInput();
    }

    $courses = new courses();
    $courses->name = $request->name;
    $courses->active = $request->active;
    $courses->save();

    // $dtatToInsert = [
    //         'name' => $request->name,
    //         'active' => $request->active
    //     ];
    //     courses::create($dtatToInsert);
    //     return redirect()->route('courses.index');
    return redirect()->route('courses.index')->with('success', 'تم اضافة بيانات الكورس بنجاح');
    }


    public function edit(String $id){
        $data=courses::find($id);
        if(empty($data)){
        return redirect()->route('courses.index')->with('error', 'الكورس غير موجود');

        }
        return view('courses.edit', ['data' => $data]);
    }
    
    public function update(CreateCourseValidationRequest $request, String $id){
        $data=courses::find($id);
        if(empty($data)){
            return redirect()->route('courses.index')->with('error', 'الكورس غير موجود');
            
            }
        $counter=courses::where('name',$request->name)->where('id','!=',$id)->count();
        if($counter > 0){
            return redirect()->back()->with('error', 'اسم الكورس موجود مسبقا');
            }
            $data->name = $request->name;
            $data->active = $request->active;
            $data->save();
            return redirect()->route('courses.index')->with('success', 'تم تعديل بيانات الكورس بنجاح');
            }


            public function destroy(String $id){
                $data=courses::find($id);
                if(empty($data)){
                return redirect()->route('courses.index')->with('error', 'الكورس غير موجود');
                
                }
                $data->delete();
                return redirect()->route('courses.index')->with('success', 'تم حذف الكورس بنجاح');
            }
}
