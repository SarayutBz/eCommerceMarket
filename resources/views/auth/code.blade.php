@extends('layout')
@section('content')

<h3>hello</h3>
<p>code</p>

<form method="POST" action="{{ route('reset') }}">
    @csrf
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="code" placeholder="Code" required>
<button type="submit">send</button>
</form>

<a href="{{route('forgotpassword')}}">ต้องการให้ส่งรหัสอีกครั้ง</a>

@endsection
