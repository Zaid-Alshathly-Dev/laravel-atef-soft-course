<title>
@yield('title','الرئيسيه')    
</title>
<h1 style="color: white; text-align: center; background-color: #333; padding: 20px;">انا الهيدر بالاعلى </h1>
<p style="color: black; text-align: center; background-color: rgb(209, 176, 176);">my pragraph is here</p>
{{-- @include('article') --}}
{{-- @include('article', ['name' => 'zaid']) --}}
@yield('content')
@include('loginpage.littlecopy')
<h1 style="color: white; text-align: center; background-color: #333; padding: 20px;">انا الفوتر بالاسفل </h1>