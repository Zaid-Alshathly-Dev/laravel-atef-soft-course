<h2>Welcome, {{$info['name']}}!</h2>
<p>بريدك الالكتروني: {{$info['email']}}</p>
<p>مستواك: {{$info['level']}}</p>
<h4>الكورس</h4>
<ul>
    @foreach($info['course'] as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>