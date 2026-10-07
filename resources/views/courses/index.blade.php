@extends('Main_layout')
@section('title')
الكورسات 
@endsection

@section('content')
          <div class="col-12"   style="background-color: white; padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center ; float: none">بيانات الكورسات 
                <a class="btn btn-sm btn-info " href="{{ route('courses_create') }}" style="float: right">اضافه جديده</a>
                </h3>

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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="example2" class="table table-bordered table-hover text-center" >
                  <thead>
                    <tr>
                      <th>اسم الكورس </th>
                      <th>حالة التفعيل </th>
                      <th>تاريخ الاضافه </th>
                      <th>تاريخ التحديث </th>
                      <th>التحكم </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $info)
                        <tr>
                      <td>{{ $info->name }}</td>
                      <td>@if($info->active==1) مفعل @else غير مفعل @endif</td>
                      <td>{{ $info->created_at }}</td>
                      <td>{{ $info->updated_at }}</td>
                      <td>
                        <a href="{{ route('courses_create',$info->id) }}"  class="button"   style="padding: 10px ;background-color: green ; color: white" >تعديل</a>
                        <a href="{{ route('courses_create',$info->id) }}"  class="button"  style="background-color: red ;   margin-right: 10px ; padding: 10px ; color: white" >حذف </a>


                      </td>
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