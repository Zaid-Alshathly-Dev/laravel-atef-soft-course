     @extends('Main_layout')

     @section('title')
       تفاصيل الدورة التدريبية
     @endsection
     
     
     @section('content')
     <div class="col-12" style="background-color: white !important">
           @if(@Session::has('success'))
                <div class="alert alert-success alert">
                {{ @Session::get('success'); }}
                </div>
                @endif

                  @if(@Session::has('error'))
                <div class="alert alert-danger alert">
                {{ @Session::get('error'); }}
                </div>
                @endif
             
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover" > 
            <tr>
              <td>اسم الدورة:</td>
              <td>{{ $data->course_name }}</td>
            </tr>
            <tr>
              <td>سعر الدورة:</td>
              <td>{{ $data->price*1 }}</td>
            </tr>
            <tr>
              <td>تاريخ بداية الدورة:</td>
              <td>{{ $data->start_date }}</td>
            </tr>
            <tr>
              <td>تاريخ نهاية الدورة:</td>
              <td>{{ $data->end_date }}</td>
            </tr>
            <tr>
              <td>ملاحظات:</td>
              <td>{{ $data->notes }}</td>
            </tr>
            <tr>
              <td>عدد الطلاب المشاركين في الدورة:</td>
              <td>{{ $data['student_counter']*1 }}</td>
            </tr>
            <tr>
              <td colspan="2">
                <a href="{{ route('training_courses.add_student',$data->id) }}"  class="button"   style="padding: 5px ;background-color: green ; color: white" >اضافة طالب</a> 

              </td>
            </tr>

           
          </table> 
           @if(@isset ($training_courses_enrollments) and !@empty($training_courses_enrollments) and count($training_courses_enrollments) > 0)
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th>اسم الطالب  </th>
                      <th>تاريخ التسجيل بالدورة </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($training_courses_enrollments as $info)
                        <tr>
                      <td>{{ $info->student_name }}</td>
                      <td>{{ $info->enrolments_date }}</td>
                      <td>{{ $info->created_at }}</td>
                      <th style="width:13%">
                        <a href="{{ route('training_courses.Delet_student',$info->id) }}"  class="button"  style="background-color: red ;  padding: 5px ; color: white" >   حذف </a> <br><br>


                      </th>
                    </tr> 
                    @endforeach
                   
                    
                  </tbody>
                </table>
              </div>
                @else
                <div style="text-align: center; padding: 20px; font-size: 20px; color: red">
                  لا يوجد بيانات لعرضها
                </div>
                @endif
        </div>
  </div>
     @endsection

     