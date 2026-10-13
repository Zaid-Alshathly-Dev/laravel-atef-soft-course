@extends('Main_layout')
@section('title')
حجوزات الدورات التدريبيه 
@endsection

@section('content')
          <div class="col-12"   style="background-color: white; padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center ; float: none">بيانات الطلاب 
                <a class="btn btn-sm btn-info " href="{{ route('training_courses_create') }}" style="float: right">اضافه حجز</a>
                </h3>

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

                <div class="card-tools">
                  {{-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div> --}}
                </div>
              </div>
              @if(@isset ($data) and !@empty($data) and count($data) > 0)
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th>اسم الكورس </th>
                      <th>سعر الدوره </th>
                      <th>تاريخ البدايه </th>
                      <th>تاريخ الانتهاء </th>
                      <th>ملاحظات </th>
                      <th>تاريخ الاضافه </th>
                      <th>تاريخ التحديث </th>
                      <th>التحكم </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $info)
                        <tr>
                      <td>{{ $info->course_name }}</td>
                      <td>{{ $info->price*1 }}</td>
                      <td>{{ $info->start_date }}</td>
                      <td>{{ $info->end_date }}</td>
                      <td>{{ $info->notes }}</td>
                      <td>{{ $info->created_at }}</td>
                      <td>{{ $info->updated_at }}</td>
                      <th style="width:13%">
                        <a href="{{ route('training_courses_edit',$info->id) }}"  class="button"   style="padding: 5px ;background-color: green ; color: white" >تعديل</a> 
                        <a href="{{ route('training_courses_destroy',$info->id) }}"  class="button"  style="background-color: red ;  padding: 5px ; color: white" >   حذف </a>


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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        

@endsection  