 @if(@isset ($data) and !@empty($data) and count($data) > 0)
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover" >
                  <thead>
                    <tr>
                      <th>اسم الطالب </th>
                      <th>الدوله </th>
                      <th>العنوان </th>
                      <th>رقم الهاتف </th>
                      <th>صورة الطالب </th>
                      <th>ملاحظات </th>
                      <th>حالة التفعيل </th>
                      <th>تاريخ الاضافه </th>
                      <th>تاريخ التحديث </th>
                      <th>التحكم </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $info)
                        <tr>
                      <td>{{ $info->name }}</td>
                      <td>{{ $info->country_name }}</td>
                      <td>{{ $info->address }}</td>
                      <td>{{ $info->phone }}</td>
                      <td>
                          @if(!empty($info->image))
                              <img src="{{ asset('uploads/' . $info->image) }}" alt="Student Image" style="width: 70px; height: 70px;">
                          @else
                              <span style="color: gray; font-size: 12px;">لا توجد صورة</span>
                          @endif
                      </td>                      <td>{{ $info->notes }}</td>
                      <td>@if($info->active==1) مفعل @else غير مفعل @endif</td>
                      <td>{{ $info->created_at }}</td>
                      <td>{{ $info->updated_at }}</td>
                      <th style="width:13%">
                        <a href="{{ route('students_edit',$info->id) }}"  class="button"   style="padding: 5px ;background-color: green ; color: white" >تعديل</a> 
                        <a href="{{ route('students_destroy',$info->id) }}"  class="button"  style="background-color: red ;  padding: 5px ; color: white" >   حذف </a>


                      </th>
                    </tr> 
                    @endforeach
                   
                    
                  </tbody>
                </table>

                 <div class="col-md-12" id="ajax-pagination-in-search">
                                    <br>
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
                
              </div>
                @else
                <div style="text-align: center; padding: 20px; font-size: 20px; color: red">
                  لا يوجد بيانات لعرضها
                </div>
                @endif