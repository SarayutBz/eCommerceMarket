@extends('layout')
@section('content')


@foreach ($carts as $cart)
<div class="card-group">
    <div class="card">
      <img src="{{$cart->imageurl}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $cart->name }}</h5>
        <p class="card-text">{{ $cart->price }}</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
</div>

@endforeach


@endsection
