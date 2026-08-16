<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<h2>إضافة رحلة جديدة</h2>

<form action="{{ route('store_flight') }}" method="POST">
  @csrf
  <label for="name">اسم الرحلة:</label><br>
  <input type="text" id="name" name="name" placeholder="أدخل اسم الرحلة"><br><br> 
  <input type="submit" value="انقر للإضافة">
</form> 

</body>
</html>