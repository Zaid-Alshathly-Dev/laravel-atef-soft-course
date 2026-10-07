<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.button {
  background-color:#04AA6D ;
  border: none;
  color: white;
  padding: 10px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  float: right;
  font-size: 16px;
  cursor: pointer;
}

</style>
</head>
<body>

<h1 style="text-align: center">A Flights Table</h1>

<a href="{{ route('create_flights') }}"  class="button"> اضافه جديده </a>

<table dir="rtl" id='customers'>
  <tr>
    <th style="text-align: center">الاسم </th>
    <th style="text-align: center">الوجهة الثابتة</th>
    <th style="text-align: center">تاريخ الاضافه </th>
    <th style="text-align: center">ملاحظات  </th>
    <th style="text-align: center"></th>
    <th></th>

  </tr>
  @if (@isset($data) and !@empty($data))
  @foreach ( $data as $info)
  <tr>
    
    <td style="text-align: center">{{ $info->name }}</td>
    <td style="text-align: center">{{ $info->notes }}</td>
    
    <td style="text-align: center">
@if(!@empty($info->destinations))
{{ $info->destinations->destination }}
{{-- {{ $info->destinations->flight->name }} --}}

@endif




    </td>

    <td style="text-align: center">{{ $info->created_at }}</td>
    <td> 
      <a href="{{ route('edit_flights',$info->id) }}"  class="button"   style="padding: 10px" >تعديل</a>
      @if ($info->deleted_at!=null)
      <a href="{{ route('delete_flights',$info->id) }}"  class="button"  style="background-color: red ;   margin-right: 10px ; padding: 10px " >حذف نهائي</a>
       @endif
      @if ($info->deleted_at==null)
      <a href="{{ route('delete_soft',$info->id) }}"  class="button"  style="background-color: rgb(234, 163, 42) ;   margin-right: 10px ; padding: 10px " >حذف للسلة</a>
     @endif
      @if ($info->deleted_at!=null)
            <a href="{{ route('restore',$info->id) }}"  class="button"  style="background-color: rgb(129, 129, 92) ;   margin-right: 10px ; padding: 10px " >الغاء الحذف </a>

    @endif
    </td>
  </tr>

     
 @endforeach
     
 @endif 


</table>
{{-- {{$data->links()}} --}}
</body>
</html>



