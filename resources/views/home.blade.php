@extends('Main_layout')
@section('title')
  الصفحة الرئيسية
    @endsection

    @section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">الصفحه الرئيسية</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">العرض </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @endsection
    @section('content')

    <div style="background-size: cover; height: 550px; width: 85%; margin: 0 auto; background-image: url('{{ asset("admin/imags/layout.jpg.jpg") }}');"></div>
    @endsection

<div></div>