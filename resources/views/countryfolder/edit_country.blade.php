<!DOCTYPE html>
<html>
<body style="direction: rtl; text-align: center;">

<h2>إضافة رحلة جديدة</h2>

<form action="{{ route('country.update',$data['id']) }}" method="POST">
  @csrf
  @method('PUT')
  <label for="fname">تعديل اسم الدوله:</label><br>
  <input type="text" id="name" name="name" value="{{ $data['name'] ?? '' }}"><br><br> 
  <input type="submit" value="تحديث">
</form> 

</body>
</html>