@extends('layout')
@section('content')

<h3>hello</h3>
<p>code</p>
<form method="POST" action="{{route('reset')}}">
    @csrf
    <input type="text" name="code" required>
<button type="submit">send</button>
</form>
@endsection