@extends('Main_layout')
@section('title')
الطلاب 
@endsection

@section('content')
          <div class="col-12"   style="background-color: white; padding: 15px">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="text-align: center ; float: none">بيانات الطلاب 

               <a href="{{ route('ar') }}">ar</a>   
               <a href="{{ route('en') }}">en</a>   
               
                {{-- <a class="btn btn-sm btn-info " href="{{ route('students_create') }}" style="float: right">اضافه طالب</a> --}}
                <a class="btn btn-sm btn-info " href="{{ route('students_create') }}" style="float: right">{{__('mycustom.ADDNEW')}} </a>
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
                <div class="row">
               <div class="col-md-3">
                 
                <br> 
                 <label>البحث باسم الطالب </label>
                 
                 <input  type="text" name="searchByName" placeholder="بحث باسم الطالب    " class="form-control" id="searchByName" >
                 
                </div>
                
                <div class="col-md-3">
                <div class="form-group">
                  <br>
                          <label>بحث بحالة التفعيل </label>
                          <select  nameء="active_search"  id="active_search" class="form-control " >
                              <option value="all"> بحث بالكل  </option>
                            <option value="1" > مفعل</option>
                            <option value="0" > معطل</option>
                              
                           
                          </select>
                          
                        </div>
                        </div>

              </div>
              </div>

              <div class="card-body table-responsive p-0" style="height:auto;" id="ajax_responce_dev">
             

              @if(@isset ($data) and !@empty($data) and count($data) > 0)
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th>اسم الطالب </th>
                      <th>الدوله </th>
                      <th>العنوان </th>
                      <th>رقم الهاتف </th>
                      <th>صورة الطالب </th>
                      <th>ملاحظات </th>
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
                      <td>{{ $info->country_name }}</td>
                      <td>{{ $info->address }}</td>
                      <td>{{ $info->phone }}</td>
                      <td>
                          @if(!empty($info->image))
                              <img src="{{ asset('uploads/' . $info->image) }}" alt="Student Image" style="width: 70px; height: 70px;">
                          @else
                              <span style="color: gray; font-size: 12px;">لا توجد صورة</span>
                          @endif
                      </td>                      <td>{{ $info->notes }}</td>
                      <td>@if($info->active==1) مفعل @else غير مفعل @endif</td>
                      <td>{{ $info->created_at }}</td>
                      <td>{{ $info->updated_at }}</td>
                      <th style="width:13%">
                        <a href="{{ route('students_edit',$info->id) }}"  class="button"   style="padding: 5px ;background-color: green ; color: white" >تعديل</a> 
                        <a href="{{ route('students_destroy',$info->id) }}"  class="button"  style="background-color: red ;  padding: 5px ; color: white" >   حذف </a>


                      </th>
                    </tr> 
                    @endforeach
                   
                    
                  </tbody>
                </table>

                <div class="col-md-12" >
                                    <br>
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
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



@section('scripts')
<script>

  $(document).ready(function(){
// تأكد أن الـ jQuery متوفر وتعمل الدالة هكذا:

function make_search(){
   var searchVal = $("#searchByName").val();
   var active_search = $("#active_search").val();

    jQuery.ajax({
        url: "{{ route('students.ajax_search') }}",
        type: 'post',
        dataType: 'html',
        cache: false,
        data: {
            '_token': "{{ csrf_token() }}",
            'name': searchVal,active:active_search
        },
        success: function(data) {
            $('#ajax_responce_dev').html(data);
        },
        error: function() {
           
        }
    });




}

$(document).on('change', '#searchByName', function() {
   make_search();

});

$(document).on('change', '#active_search', function() {
  
   make_search();

});

$(document).on('click','#ajax-pagination-in-search a',function(e){

  e.preventDefault();
  var name = $(this).val();
   var active_search = $("#active_search").val();
  var url = $(this).attr("href");

    jQuery.ajax({
        url:url,
        type: 'post',
        dataType: 'html',
        cache: false,
        data: {
            '_token': "{{ csrf_token() }}",
            'name': name, active: active_search
        },
        success: function(data) {
            $('#ajax_responce_dev').html(data);
        },
        error: function() {
         
        }
    });

});



});

</script>
@endsection