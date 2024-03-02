@extends('layout')

@section('content')
    <h3 class="mt-3">Your shopping bag</h3>
    <hr>

    @if (isset($carts))
        @if ($carts->isEmpty())
            <p>ไม่มีสินค้าใดๆ</p>
        @else
            <div class="box d-flex justify-content-center">
                <div class="box2 d-inline">

                    @csrf
                    @foreach ($carts as $cart)
                        <div class="card d-inline mb-3" style="max-width: 540px;">
                            <div class="row border-bottom p-4 g-0">
                                <div class="col-md-4">
                                    <img src="{{ $cart->imageurl }}" class="img-fluid rounded-start" alt="...">
                                    <label class="text-bg-light p-3" for="">จำนวนสินค้าคงเหลือ :
                                        {{ max(0, $cart->stockquantity - $cart->quantity) }}
                                    <form method="POST" action="{{ route('delete-cart') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                        <input type="hidden" name="productID" value="{{ $cart->productID }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="price" value="{{ $cart->price }}">
                                        <button type="submit" class="mt-2 btn btn-danger text-white d-flex"
                                            onclick="return confirm('Are you sure you want to delete the cart?')">Cancel</button>
                                    </form>


                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $cart->name }}</h5>
                                        <hr>
                                        <p class="alert alert-light" role="alert">{{ $cart->description }}</p>

                                        <div class="box-price ">
                                            <p class="fs-4 card-text mt-5 "><span>ราคา </span>
                                                {{ number_format($cart->price) }}</p>

                                        <p class="" > จำนวนสิ้นค้าที่ซื้อ : {{ $cart->quantity }}</p>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @php
                        $userID = auth()->id();
                        $quantity = App\Models\Cart::where('userID', $userID)->pluck('quantity')->first();
                        $userCart = App\Models\Cart::where('userID', $userID)->get();


                        if ($userCart->count() > 0) {
                            $sumTotal = $userCart->sum('price') * $quantity ;
                            $formattedSumTotal = number_format($sumTotal);

                        } else {
                            $formattedSumTotal = 0;
                        }
                    @endphp

                    <h3 class="text-end">Total Price : {{ $formattedSumTotal }} bath</h3>
                    <div class="d-flex justify-content-end">
                        <a href="/sorry" > <button class="btn btn-dark">Pay</button></a>
                    </div>


                </div>
            </div>
        @endif
    @endif
@endsection
