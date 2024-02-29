@extends('layout')
@section('content')
<div class="img-carousel mx-auto h-100">
    <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel" data-interval="300">
        <div class="carousel-inner">
            @forelse ($products as $key => $product)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ $product->imageurl }}" class="d-block w-100" alt="{{ $product->name }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            @empty
            <p>No products available.</p>
            @endforelse
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


    <div class="Recommended-Products container">
        <h3 class="">Recommended Products</h3>
        {{-- @foreach ($images as $image)
        <h3>{{$image}}</h3>
        @endforeach --}}
        <hr>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product->imageurl }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title fw-bold">{{ $product->name }}</p>
                            <p class="card-text">{{ $product->description }}</p>

                            <div class="price d-flex ">

                                <form method="POST" action="{{ route('addCart') }}">
                                    @csrf <!-- เพิ่ม CSRF token เพื่อความปลอดภัย -->
                                    <input type="hidden" name="userID" value="{{ auth()->id() }}">
                                    <input type="hidden" name="productID" value="{{ $product->productID }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <!-- ตั้งค่าปริยายให้เป็น 1 หรือตามต้องการ -->
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <!-- ตั้งค่าปริยายให้เป็น 1 หรือตามต้องการ -->
                                    @auth
                                        <button type="submit" class="submit">
                                            <i class="text-white fa-solid fa-cart-plus"></i>
                                        </button>
                                    @else
                                        <p>กรุณาเข้าสู่ระบบก่อนที่จะเพิ่มรายการในตะกร้า</p>
                                    @endauth
                                </form>

                                <div class="text">
                                    <p class="m-2 fs-5">{{ $product->price }}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>






    </div>
@endsection
