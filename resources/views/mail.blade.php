<h1>Hi, {{ $name }}</h1>
l<p>Sending Mail from {{ $name }}.</p>
<a href="{{route('reset.token',['reset_token'=>$reset_token])}}">reset your pass</a> 