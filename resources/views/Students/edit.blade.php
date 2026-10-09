     @extends('Main_layout')

     @section('title')
       تعديل الطالب
     @endsection
     
     
     @section('content')
     <div class="col-12" >
          @if(@Session::has('error'))
                <div class="alert alert-danger alert">
                {{ @Session::get('error'); }}
                </div>
                @endif
     <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('students_update', $data->id) }}" style="background-color: white ; width:80% ; margin: 0 auto ; ">
        @csrf        
        <div class="card-body">
                  <div class="form-group">
                    <label for="name">اسم الطالب   </label>
                    <input autofocus type="text" name="name" class="form-control" id="name" value="{{ old('name', $data->name) }}">
                    @error('name')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>الدوله التابع لها الطالب </label>
                    <select  name="country_id"  id="country_id" class="form-control " >
                        <option value="">اختر الدوله </option>
                        @if (!@empty($CountrieModel))
                           @foreach($CountrieModel as $info)
                            <option value="{{ $info->id }}" @if(old('country_id',$data['country_id']) == $info->id) selected @endif> {{ $info->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('country_id')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>حالة التسجيل </label>
                    <select  name="active"  id="active" class="form-control" >
                        <option value="">اختر الحاله </option>
                        <option value="1"@if(old('active',$data['active']) == '1') selected @endif>مسجل </option>
                        <option value="0"@if(old('active',$data['active']) == '0') selected @endif>غير مسجل</option>
                    </select>
                    @error('active')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="national_id"> الرقم القومي  </label>
                    <input autofocus type="text" name="national_id" class="form-control" id="national_id" value="{{ old('national_id',$data['national_id']) }}">
                 @error('national_id')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="address"> العنوان  </label>
                    <input autofocus type="text" name="address" class="form-control" id="address" value="{{ old('address',$data['address']) }}">
                </div>
                
                 
                  <div class="form-group">
                    <label for="phone"> الهاتف  </label>
                    <input autofocus type="text" name="phone" class="form-control" id="phone" value="{{ old('phone',$data['phone']) }}">
                 @error('phone')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="notes"> الملاحظات  </label>
                    <input autofocus type="text" name="notes" class="form-control" id="notes" value="{{ old('notes',$data['notes']) }}">
                </div>

                  <div class="form-group">
                    <label for="photo"> اضافة صورة  </label>
                    <img src="{{ asset('uploads/'.$data->image) }}" alt="Student Image" style="width: 70px; height: 70px;"> <br><br>
                    <input autofocus type="file" name="photo" class="form-control" id="photo" value="{{ old('photo') }}">
                </div>
                 
                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">تعديل الطالب</button>
                </div>
            </div>
              </form>
  </div>
     @endsection

     