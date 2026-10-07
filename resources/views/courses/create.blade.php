     @extends('Main_layout')

     @section('title')
       إضافة كورس جديد
     @endsection
     
     
     @section('content')
     <div class="col-12" >
     <form role="form" method="POST" action="{{ route('courses_store') }}" style="background-color: white ; width:80% ; margin: 0 auto ; ">
        @csrf        
        <div class="card-body">
                  <div class="form-group">
                    <label for="name">اسم الكورس </label>
                    <input type="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>حالة التسجيل </label>
                    <select  name="active"  id="active" class="form-control" >
                        <option value="">اختر الحاله </option>
                        <option value="1">مسجل </option>
                        <option value="0">غير مسجل</option>
                    </select>
                    @error('active')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                 
                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
              </form>
  </div>
     @endsection

     