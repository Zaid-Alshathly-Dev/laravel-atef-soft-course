     @extends('Main_layout')

     @section('title')
       إضافة دورة تدريبية
     @endsection
     
     
     @section('content')
     <div class="col-12" >
          @if(@Session::has('error'))
                <div class="alert alert-danger alert">
                {{ @Session::get('error'); }}
                </div>
                @endif
     <form role="form"  method="POST" action="{{ route('training_courses_store') }}" style="background-color: white ; width:80% ; margin: 0 auto ; ">
        @csrf        
        <div class="card-body">
                <div class="form-group">
                    <label>الكورس المخصص للدورة  </label>
                    <select  name="course_id"  id="course_id" class="form-control " >
                        <option value="">اختر الكورس </option>
                        @if (!@empty($courses))
                           @foreach($courses as $info)
                            <option value="{{ $info->id }}" @if(old('course_id') == $info->id) selected @endif> {{ $info->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('course_id')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="price"> سعر الدوره  </label>
                    <input autofocus type="text" name="price" class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="price" value="{{ old('price') }}">
                 @error('price')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="start_date"> تاريخ بداية الدورة  </label>
                    <input autofocus type="date" name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}">
                </div>
                
                 
                  <div class="form-group">
                    <label for="end_date"> تاريخ نهاية الدورة  </label>
                    <input autofocus type="date" name="end_date" class="form-control" id="end_date" value="{{ old('end_date') }}">
                 @error('end_date')
                    <span style="color: red ">{{ $message  }}</span><br>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="notes"> الملاحظات  </label>
                    <input autofocus type="text" name="notes" class="form-control" id="notes" value="{{ old('notes') }}">
                </div>

                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary"> اضافة الدورةالتدريبية</button>
                </div>
            </div>
              </form>
  </div>
     @endsection

     