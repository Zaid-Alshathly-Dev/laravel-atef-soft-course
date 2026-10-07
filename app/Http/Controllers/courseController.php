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
        
    }
}
