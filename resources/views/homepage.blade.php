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
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product->imageurl }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title fw-bold">{{ $product->name }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="price d-flex ">
                                <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight">
                                    <i class="text-white fa-solid fa-cart-plus"></i>
                                </a>
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
