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
    <th style="text-align: center">تاريخ الاضافه </th>
  </tr>
  @if (@isset($data) and !@empty($data))
  @foreach ( $data as $info)
  <tr>
    <td style="text-align: center">{{ $info->name }}</td>
    <td style="text-align: center">{{ $info->created_at }}</td>
  </tr>

     
 @endforeach
     
 @endif 


</table>

</body>
</html>



