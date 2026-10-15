     @extends('Main_layout')

     @section('title')
       إضافة طالب للدوره 
     @endsection
     
     
     @section('content')
     <div class="col-12" >
          @if(@Session::has('error'))
                <div class="alert alert-danger alert">
                {{ @Session::get('error'); }}
                </div>
                @endif
     <form role="form"  method="POST" action="{{ route('training_courses.DOadd_student',$data['id']) }}" style="background-color: white ; width:80% ; margin: 0 auto ; ">
        @csrf        
        <div class="card-body">
                <div class="form-group">
                    <label>بيانات الطلاب </label>
                    <select  name="student_id"  id="student_id" class="form-control " >
                        <option value="">اختر الطالب </option>
                        @if (!@empty($students))
                           @foreach($students as $info)
                            <option value="{{ $info->id }}" @if(old('student_id') == $info->id) selected @endif> {{ $info->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('student_id')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="enrolment_date"> تاريخ تسجيل الدوره </label>
                    <input autofocus type="date" name="enrolment_date" value="@php
                      echo date("Y-m-d");
                    @endphp" class="form-control" id="enrolment_date" value="{{ old('enrolment_date') }}">
                 @error('enrolment_date')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                  
                  
                
                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary"> اضافة الطالب للدولة</button>
                  <a href="{{ route('training_courses.details',$data['id']) }}"  class="btn btn-primary"> العودة</a>
                </div>
            </div>
              </form>
  </div>
     @endsection

     