<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<form action="{{ route('country.store') }}" method="POST">
  @csrf
  <label for="name">اسم الدوله:</label><br>
  <input type="text" id="name" name="name" placeholder="أدخل اسم الرحلة"><br><br> 
  @error('name')
      <span style="color: red ">{{ $message  }}</span><br>
  @enderror
  <input type="submit" value="انقر للإضافة">
</form> 

</body>
</html>