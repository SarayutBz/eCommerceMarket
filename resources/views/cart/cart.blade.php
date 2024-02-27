@extends('layout')
<style>

</style>
@section('content')
    <h3 class="mt-3">Your shopping bag</h3>
    <hr>
    {{-- @foreach ($carts as $cart)
<h3>{{$cart}}</h3>
@endforeach --}}
    @if (isset($carts))
        @if ($carts->isEmpty())
            <p>ไม่มีสินค้าใดๆ</p>
        @else
            <div class="box d-flex justify-content-center">
                <div class="box2  d-inline">
                    @foreach ($carts as $cart)
                        <div class="card  d-inline   mb-3" style="max-width: 540px;">
                            <div class="row border-bottom  p-4 g-0">
                                <div class="col-md-4">
                                    <img src="{{ $cart->imageurl }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $cart->name }}</h5>
                                        <hr>
                                        <p class=" alert alert-light" role="alert">{{ $cart->description }}</p>


                                        <p class="fs-4 card-text mt-5 "> <span>ราคา </span>{{ $cart->price }}</p>
                                        <form method="POST" action="{{ route('delete-cart') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                            <input type="hidden" name="productID" value="{{ $cart->productID }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <!-- ตั้งค่าปริยายให้เป็น 1 หรือตามต้องการ -->
                                            <input type="hidden" name="price" value="{{ $cart->price }}">
                                            <button type="submit" class="btn btn-danger text-white d-flex"
                                                onclick="return confirm('Are you sure you want to delete the cart?')">Cancel</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @php

                        $sumTotal = $cart->sum('price');

                    @endphp

                    <h3 class="text-end">Total Price : {{ $sumTotal }}</h3>
                    <form class="d-flex justify-content-end" action="">

                        <button class=" btn btn-dark ">Pay</button>
                    </form>
        @endif
    @endif


    </div>

    </div>
@endsection
