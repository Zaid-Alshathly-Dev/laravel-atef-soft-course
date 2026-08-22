<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<h2>إضافة رحلة جديدة</h2>

<form action="{{ route('update_flights',$data['id']) }}" method="POST">
  @csrf
  <label for="fname">تعديل اسم الرحلة:</label><br>
  <input type="text" id="name" name="name" value="{{ $data['name'] ?? '' }}"><br><br> 
  <input type="submit" value="تحديث">
</form> 

</body>
</html>