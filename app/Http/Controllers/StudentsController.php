<?php

namespace App\Http\Controllers;

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
class StudentsController extends Controller
{

use GeneralTraits;

     public function index(){

        // Zaid();

        $this->zaid_soft();
        session()->put('locale','ar');
        $data=Students::paginate(4);
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

// ارسال الاشعار لكل المستخدمين 
$users=User::select("id")->get();
$content="تم اضافة طالب جديد باسم ".$request->name;
Notification::send($users,new CreateStudent($request->name,$content));




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

            public function ajax_search_students(Request $request){
            if($request->ajax()){
                $name=$request->name;
                $active=$request->active;
                if(empty($name)){
                    $filed1="id";
                    $operator1=">";
                    $value1=0;
                    
                    }else
                    {
                    $filed1="name";
                    $operator1="like";
                    $value1="%{$name}%";
                    
                }

                 if($active=="all"){
                    $filed2="id";
                    $operator2=">";
                    $value2=0;
                    
                    }else
                    {
                    $filed2="active";
                    $operator2="=";
                    $value2=$active;
                    
                }

                $data=Students::where($filed1,$operator1,$value1)->where($filed2,$operator2,$value2)->paginate(1);
             if(!empty($data)){
            foreach($data as $info){
                $info->country_name=CountrieModel::where('id','=',$info->country_id)->value('name');
            }
            }
            return view('students.ajax_search_students',['data'=>$data]);
 }
            }


}