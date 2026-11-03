<?php

use App\Http\Controllers\CountiesController;
use App\Http\Controllers\FlightsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Training_courses_Controller;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use app\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;




/*Route::get('/', function () {
    return view('welcome');
});*/

// dump('5');

Route::get('/testRequest', function(Request $request){
   
// return $request->all();
// return [
// 'path'=>$request->path(),
// 'url'=>$request->url(),
// 'host'=>$request->host(),
// 'method'=>$request->method(),
// ];

// return $request->header('user-agent');
// return $request->header('X-App-Name','zaid ');

// return $countenTypes= $request->getAcceptablecontentType();

// if($request->hasHeader('X-Header-Name')){
// return "found";
// }else{

// return "not found";
    
// }

// if($request->hasHeader('AppKey')=="zaid"){
// return response()->json(['data'=>'success operation']);
// }else{

// return response()->json(['data'=>'faild operation']);
    
// }



});


// route::get('/sendMyHeaders',function(Request $request){
//     return response("zaid alshathly")->header('AppName','pos')->header('Version','3');
// });

route::get('contentNegotiation',function(Request $request){
// $countenTypes = $request->getAcceptableContentTypes();

// if($request->accepts(['text/html','application/json'])){
// return "accepts text, html";
// }else{
// return " not accepts application , json";
    
// }

// $preferred = $request->prefers(['text/html','application/json']);
// return "النوع المفضل لدي ".$preferred; 

if($request->expectsJson()){
    return response()->json(['key'=>'value']);
}else {
    return "no please!";
}

});


route::get('psr7',function(ServerRequestInterface $request){
$method = $request->getMethod();
$uri = $request->getUri();
$headers = $request->getHeaders();
return response()->json([
'method' => $method,
'uri' => $uri,
'headers' => $headers,


]);
});









route::get('/sendMyHeadersToMe',function(Request $request){

$request->headers->set('AppName','اهلا بكم في اليمن ');
$headerValue = $request->header('AppName');
    return " اهل الخليج العربي ".$headerValue;
    
});




Route::redirect('zaid', 'zaidoon ', 301);

route :: get('/', [homeController::class,'index'])->name('home');

// route::get ('/',function(){
// return 'Zaid Alshathly';
// });

Route::get('/hi',function(){
    return "welcome to zaid alshathly web";
});

// route::get('hi',function(){
    
// })->middleware('PoliceMan');

route::get('ar',function(){
session()->put('locale','ar');
return redirect()->back();
})->name('ar');



route::get('en',function(){
    session()->put('locale','en');
    return redirect()->back();
    
})->name('en');


/*route::get ('/zaid/{age?}/{country?}',function($age =21,$country ='yemen'){
    return 'My name is Zaid Alshathly and my age is '.$age .', my country is ' .$country;
    });*/


    // route::get ('/zaid/{name}/{age}',function($name ,$age){
    // return 'welcome mstr '.$name . 'my age is '.$age;
    // })-> where ('name','[A-Z a-z]+')
    // -> where ('age','[0-9]+');

    // route::get ('/zaid/name/{name}',function($name){
    // return 'welcome mstr '.$name;
    // })-> where ('name','[A-Z a-z]+');

    // route::get ('/zaid/age/{age}',function($age){
    // return 'my age is '.$age;
    // })-> where ('age','[0-9]+');
    
    
    // route:: prefix('zaid')->group( function(){
    //     route::get ('/name/{name}',function($name){
    //     return 'welcome mstr '.$name;
    //     })-> where ('name','[A-Z a-z]+');
    
    //     route::get ('/age/{age}',function($age){
    //     return 'my age is '.$age;
    //     })-> where ('age','[0-9]+');
        
    // });


//     route::get('/zaid/hareth/{age}', function($age){
// return 'welcome mstr zaid alshathly , my age is :'.$age;
//     })->name ('hareth');


use App\Http\Controllers\UserController;
use App\Http\Controllers\wellcomeController;
use App\Models\Flight;
use Illuminate\Support\Facades\Response;

// route ::get('/zaid', [UserController::class, 'asd']);
// route ::get('/hareth', [UserController::class, 'age']);

// route::get('login', [UserController::class, 'get_login']);
  
// route ::get ('zaid',function(){
//     return view ('loginpage.login',['name' => 'wafa']);
// });
// route ::get ('zaid',function(){
//     return view ('loginpage.login');
// });

// route ::get ('zaid',function(){
//     return view ('loginpage.login',['record' => '1']);
// });

// route::get('main',function(){
//     return view('master');
// });

// route::get('article',function(){
//     return view('article');
// });

// route::get('hi',function(){
//     return "welcome to zaid alshathly";
// });

// route::get('yourname/{name?}',function($name = 'zaid alshathly'){
//     return "welcome to  " . $name;
// });

// route::get('signup',function(){
// return view('signup',['name' => 'zaid alshathly']);
// });

// use App\Http\Controllers\signupController; 

// route::get('signup',[signupController::class , 'get_signup']);


// route::get('page1',function(){
//     return view ('page1');
// });

// route::get('article',function(){
//     return view ('article');
// });

// route::get('hi',function(){
//     return env('APP_URL');
    
// });

// route::get('flights',function(){
//     return Flight::all(); 
    
// });

route::get('flights',[FlightsController::class,'index'])->name('flights');
route::get('create_flights',[FlightsController::class,'create'])->name('create_flights');
route::post('store_flight',[FlightsController::class,'store'])->name('store_flight');
route::get('edit_flights/{id}',[FlightsController::class,'edit'])->name('edit_flights');
route::post('update_flights/{id}',[FlightsController::class,'update_flights'])->name('update_flights');
route::get('delete_flights/{id}',[FlightsController::class,'delete'])->name('delete_flights');
route::get('delete_soft/{id}',[FlightsController::class,'delete_soft'])->name('delete_soft');
route::get('restore/{id}',[FlightsController::class,'restore'])->name('restore');


// start courses routes
route::get('courses',[CourseController::class,'index'])->name('courses.index');
route::get('create_courses',[CourseController::class,'create'])->name('courses_create');
route::post('store_courses',[CourseController::class,'store'])->name('courses_store');
route::get('edit_courses/{id}',[CourseController::class,'edit'])->name('courses_edit');
route::post('update_courses/{id}',[CourseController::class,'update'])->name('courses_update');
route::get('destroy_courses/{id}',[CourseController::class,'destroy'])->name('courses_destroy');
route::get('testUrl_courses',[CourseController::class,'testUrl'])->name('courses.testUrl');



// start Student routes
route::get('students',[StudentsController::class,'index'])->name('students.index');
route::get('create_students',[StudentsController::class,'create'])->name('students_create');
route::post('store_students',[StudentsController::class,'store'])->name('students_store');
route::get('edit_students/{id}',[StudentsController::class,'edit'])->name('students_edit');
route::post('update_students/{id}',[StudentsController::class,'update'])->name('students_update');
route::get('destroy_students/{id}',[StudentsController::class,'destroy'])->name('students_destroy');
route::post('ajax_search_students',[StudentsController::class,'ajax_search_students'])->name('students.ajax_search');


// start training courses routes
route::get('training_courses',[Training_courses_Controller::class,'index'])->name('training_courses.index');
route::get('create_training_courses',[Training_courses_Controller::class,'create'])->name('training_courses.create');
route::post('store_training_courses',[Training_courses_Controller::class,'store'])->name('training_courses.store');
route::get('edit_training_courses/{id}',[Training_courses_Controller::class,'edit'])->name('training_courses.edit');
route::post('update_training_courses/{id}',[Training_courses_Controller::class,'update'])->name('training_courses.update');
route::get('destroy/{id}',[Training_courses_Controller::class,'destroy'])->name('training_courses.destroy');
route::get('details_training_courses/{id}',[Training_courses_Controller::class,'details'])->name('training_courses.details');
route::get('addStudentTo_details_training_courses/{id}',[Training_courses_Controller::class,'addStudent'])->name('training_courses.add_student');
route::post('DOaddStudentTo_details_training_courses/{id}',[Training_courses_Controller::class,'DOaddStudent'])->name('training_courses.DOadd_student');
route::get('DeletStudentFrom_training_courses/{id}',[Training_courses_Controller::class,'DeletStudent'])->name('training_courses.Delet_student');


Route::resource('country',CountiesController::class);
// Route::resource('country',CountiesController::class)->except(['create']);
// Route::resource('country',CountiesController::class)->only(['create']);

// الروت الخاصه بالمزود الخدمه 
route::get('wellcome',[wellcomeController::class,'index']);
// route::get('myfacade',[wellcomeController::class,'myfacade']);

route::redirect('here1','https://www.google.com/');
route::permanentRedirect('here2','https://www.google.com/');


route::get('getmyrouteinfo/{username}',[wellcomeController::class,'getmyrouteinfo'])->name('get_my_route_info');
route::get('myfacade',[wellcomeController::class,'myfacade']);


//simple_response_string
route::get('/simple_response_string',function(){
return "hello word";
});

// simple_response_array
route::get('/simple_response_array',function(){
return [1,2,3];
});

// simple_response_header
route::get('/simple_response_header',function(){
    return response("hello word",200)->
    header('content-type','text/plain');
    });
    
    route::get('/user/{user}',function(User $user){
        return $user;
        });
        
        
        
    route::get('/return_multi_headers',function(){
    return response("multi headers")->
    header('content-type','json')->
    header('X-header-One','header Value')->
    header('X-header-Two','header Value');
    });
    
    
    
    route::get('/return_multi_headers_array',function(){
        return response("multi headers array")->
        withHeaders([
            'content-type'=>'json',
            'X-header-One'=>'header Value',
            'X-header-Two'=>'header Value'
            ]);
            
            });
            
            route::get('/return_cookie',function(){
            return response('hello word cookie')->cookie(
        'zaid alshathly','student',30,'/',null,true,true 
            );
            });
            
            cookie::queue('color','red',60);
            cookie::expire('zaid alshathly');
            
            
            route::get('/ready_cookie',function(){
           $cookie = cookie('size','41',60) ;    
            return response('hello word cookie2')->cookie($cookie);
            });
            
            
            route::get('/remove_cookie',function(){
            return response('hello remove cookie2')->withoutCookie('zaid alshathly');
            });


            route::get('/redirect_dashbord',function(){
            return redirect('/remove_cookie');
            });
            
            
            route::get('/return_back',function(){
            return back();
            });
            
            route::get('/return_redirect_to_route',function(){
                return redirect()->route('courses.index');
                });
                
                
                // توجييه لداله معينه  
                route::get('/return_redirect_add_courses',function(){
                    return redirect()->action([CourseController::class,'create']);
                    });
                    
                    
                    
                    route::get('/return_redirect_edit_courses',function(){
                        return redirect()->action([CourseController::class,'edit'],['id'=>1]);
                        });
                        
                        
                        
            route::get('/return_external_domain',function(){
                return redirect()->away('https://gemini.google.com/');
                        });


                route::get('/return_view ',function(){
                    return response()->view('hello_view',['name'=>'zaid alshathly'],200)->header('content-Type','text-Json');
                        });
                        
                        
                        route::get('/return_json_data ',function(){
                        return response()->json([
                    'name'=>'zaid',
                    'state'=>'active',
                        ]);
                        });
                        
                        
                        route::get('/jsonp ',function(Request $request){
                        return response()->json([
                    'name'=>'zaid',
                    'state'=>'200',
                        ])->withCallback($request->input('callback'));
                        });

                        route::get('download_file',function(){
                        return response()->download(public_path('zaid.pdf.txt'));
                        });


                        route::get('/stream',function(){
                        return response()->stream(function(): void {
                            foreach(['devloper','admin','zaid','braa','hareth','amr'] as $string){
                                echo $string ,"<br>";
                                ob_flush();
                                flush();
                                sleep(2);
                                

                            }
                        },200,['X-Accel-Buffering'=>'no'] );
                        });


    // route::get('test_macro', function(){
    //     return response()->caps('zaid');  
    // });




    route::get('unsubsecribe/{userid}',function(Request $request){
    if(! $request -> hasValidSignature()){
        abort(401);
    }
    return "تم الغاء الاشتراك بنجاح " ;
    })->name('unsubsecribe');


    route::get('send_email_var',function(){
    $url = URL::temporarySignedRoute(
    'unsubsecribe', now()->addMinutes(1),['userid'=>1]        

    );
    return "رابط الالغاء الخاص بكم : <a href='{$url}'> {$url} </a>" ;
    });







    route::get('setSession', function(Request $request){
$request->session()->put('username','zaid alshathly');
$request->session()->put('user_id',1);
$request->session()->put('role','admin');
return "تم تخزين الجلسه بنجاح" ;
    });
    
    
    route::get('getSession', function(Request $request){
    $username = $request->session()->get('username','غير معرف ');
    $id = $request->session()->get('user_id','غير معرف ');
    $role = $request->session()->get('role','غير معرف ');
    return "اسم المستخدم هو ". $username." <br>بصلاحية ". $role ." <br>ورقم المعرف هو ". $id;
    });
    
    // helper session 
    route::get('SetSessionByHelper', function(){
    session(['the_name'=>'zaid','the_id'=>5]);
    return "تم تخزين البيانات بنجاح ";
    });
    
    
    
    route::get('GetSessionByHelper', function(){
        $username=session('the_name','لايوجد');
        $id=session('the_id','لايوجد');
        return "اسم المستخدم هو ". $username." <br>ورقم المعرف هو ". $id;
    });
    
    
    
    // facade session 
    route::get('SetSessionByFacade', function(){
    Session::put('the_name','zaid');
    Session::put('the_type','admin');
    return "تم تخزين البيانات بنجاح ";
    });
    
    route::get('GetSessionByFacade', function(){
        $username=Session::get('the_name','لايوجد');
        $type=Session::get('the_type','لايوجد');
        return "اسم المستخدم هو ". $username." <br> والنوع هو ". $type;
    });

// flash session
    route::get('/flash_data',function(Request $request){
    $request->session()->flash('status','تم التنفيذ بنجاح ');
    return view('flash_session_example');
    });
    
    
    // reflash session
    route::get('/reflash_data_frist',function(Request $request){
        $request->session()->flash('status','هذه الرساله لمدة طلب واحد ');
        return redirect('/reflash_data_second');
        });
        
        
            // route::get('/reflash_data_second',function(Request $request){
            // $request->session()->reflash();
            // return redirect('/reflash_data_thrid');

            // });
            
            
            route::get('/reflash_data_thrid',function(Request $request){
            
                return view('flash_session_example');
            
                
            });
            
            
            //    keep reflash
            route::get('/keep_data_frist',function(Request $request){
                $request->session()->flash('username','zaid');
                $request->session()->flash('role','admin');
                $request->session()->flash('email','zaid1234554321@gmail.com');
                return redirect('/keep_data_second');
                });
                
                
                    // route::get('/keep_data_second',function(Request $request){
                    // $request->session()->keep(['username','email']);
                    // // $request->session()->reflash();
                    // return redirect('/reflash_data_thrid');
        
                    // });
                    
                    
                    route::get('/keep_data_thrid',function(Request $request){
                    
                        return view('flash_session_example');
                    
        
                    });
                    
                    
            // now session
            // route::get('/now_session_data',function(Request $request){
            // $request->session()->now('status','تمت العمليه فورا الان ');
            // return view('flash_session_example');
            //     });




        route::get('forget_Session', function(Request $request){
        // forget one key
        $request->session()->forget('name');
        // forget more or multiple keys
        $request->session()->forget(['name','role']);
        // forget all keys
        $request->session()->flush();
        return "تم حذف البيانات من الجلسه بنجاح" ;
            });
            
            
            route::get('regenerate_Session', function(Request $request){
            $request->session()->regenerate();
            return "تم إعادة توليد الجلسة بنجاح" ;
                });
                
                
                route::get('invalidate_Session', function(Request $request){
                $request->session()->invalidate();
                return 
                "تم اعادة تعيين معرف الجلسه مع حذف جميع البيانات المخزنه في الجلسه بنجاح" ;
                    });


        route::get('return_session_id', function(Request $request){ 
                $session_id = $request->session()->getId();
                return "معرف الجلسه الحالي هو : ".$session_id;
                        });    
          
                        
      route::get('cache_put',function(Request $request){
    $session_id = $request->session()->getId();
    Cache::put("session_{$session_id}_discount", 10 , now()->addMinutes(5));
    return "تم تخزين البيانات في الكاش الحاليه للجلسه بنجاح";
      });  
      
      
      route::get('cache_get',function(Request $request){
        $session_id = $request->session()->getId();
        $discount = Cache::get("session_{$session_id}_discount");
            Cache::forget("session_{$session_id}_discount");
        return "قيمة الخصم المخزنه في الكاش الحاليه للجلسه هي : ".$discount;
          });  
          
          
        //   route::get('cache_forget',function(Request $request){
        //     $session_id = $request->session()->getId();
        //     return "تم حذف البيانات من الكاش الحاليه للجلسه بنجاح";
        //       });






//session blocking
Route::get('session_blocking',function(){
sleep(5);
return "تم تنفيذ العملية بنجاح بعد الانتظار 5 ثواني";
})->block($lockSeconds = 10, $waitSeconds = 10) ;


Route::get('session_blocking_show',function(){
sleep(5);
return "تم عرض البيانات بنجاح";
})->block($lockSeconds = 10, $waitSeconds = 10) ;


route::get('set_cache_database_example',function(){
Cache::put('discount', 10 , now()->addMinutes(5));
Cache::put('role', 100 , now()->addMinutes(5));
Cache::put('type', 20 , now()->addMinutes(5));
$discount = Cache::get('discount');
return " الخصم المخزنه في الكاش الحاليه للجلسه هي : ".$discount;
});




route::get('forget_cache',function(){
    // Cache::forget('discount');
    // Cache::put('discount',15 ,5);
    Cache::flush();
    return "تم حذف البيانات من الكاش بنجاح";
    });
    
    route::get('set_cache_Memorization_example',function(){
    Cache::memo()->put('name','zaid');
    Cache::memo()->get('name');//قراءه من الكاش الفعلي 
    Cache::memo()->get('name');//قراءه من الكاش الموقت
    Cache::memo()->put('name','zaid alshathly');//التعديل على القيمه الموجوده بالذاكره الفعليه 
    Cache::memo()->get('name');//قراءه من الكاش الفعليه 
    Cache::memo()->get('name');//قراءه من الكاش الموقته
    return Cache::memo()->get('name');//عرض القيمه من الكاش الموقته
        });


    route::get('cache_Memorization_example',function(){
    
    return $discuont = Cache::memo()->get('discount');
        });
    

    route::get('test_deleted_cache',function(){
        
        $discount = Cache::get('discount');
        return " الخصم المخزنه في الكاش الحاليه للجلسه هي : ".$discount;
    return "تم حذف البيانات من الكاش بنجاح";
});


















route:: fallback(function(){
    
    return 'sorry this page not found'; 
});