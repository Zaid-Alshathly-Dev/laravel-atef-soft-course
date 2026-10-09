     @extends('Main_layout')

     @section('title')
       تعديل بيانات الكورس
     @endsection
     
     
     @section('content')
     <div class="col-12" >
          @if(@Session::has('error'))
                <div class="alert alert-danger alert">
                {{ @Session::get('error'); }}
                </div>
                @endif
     <form role="form" method="POST" action="{{ route('courses_update',$data['id']) }}" style="background-color: white ; width:80% ; margin: 0 auto ; ">
        @csrf        
        <div class="card-body">
                  <div class="form-group">
                    <label for="name">اسم الكورس </label>
                    <input autofocus type="text" name="name" class="form-control" id="name" value="{{ old('name', $data['name']) }}">
                    @error('name')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>حالة التسجيل </label>
                    <select  name="active"  id="active" class="form-control" >
                        <option value="">اختر الحاله </option>
                        <option value="1"@if(old('active', $data['active']) == '1') selected @endif>مسجل </option>
                        <option value="0"@if(old('active', $data['active']) == '0') selected @endif>غير مسجل</option>
                    </select>
                    @error('active')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                 
                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">تعديل الكورس</button>
                </div>
            </div>
              </form>
  </div>
     @endsection

     