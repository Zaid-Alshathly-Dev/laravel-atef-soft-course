<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<h2>إضافة رحلة جديدة</h2>
{{-- <!-- /resources/views/post/create.blade.php -->

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form --> --}}

<form action="{{ route('store_flight') }}" method="POST">
  @csrf
  <label for="name">اسم الرحلة:</label><br>
  <input type="text" id="name" name="name" placeholder="أدخل اسم الرحلة"><br><br> 
  @error('name')
      <span style="color: red ">{{ $message  }}</span><br>
  @enderror
  <input type="submit" value="انقر للإضافة">
</form> 

</body>
</html>