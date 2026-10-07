<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<h2>إضافة رحلة جديدة</h2>

<form action="{{ route('update_flights',$data['id']) }}" method="POST">
  @csrf
  <label for="fname">تعديل اسم الرحلة:</label><br>
  <input type="text" id="name" name="name" value="{{ old('name', $data['name'] ?? '') }}"><br><br>
   @error('name')
  <span style="color: red ">{{ $message  }}</span><br>
  @enderror
  <label for="fname">تعديل ملاحظات الرحلة:</label><br>

  <input type="text" id="notes" name="notes" value="{{ old('notes', $data['notes'] ?? '') }}"><br><br> 
  <input type="submit" value="تحديث">
</form> 

</body>
</html>