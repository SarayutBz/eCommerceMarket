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



    <div class="Recommended-Products">
        <h3 class="">Recommended Products</h3>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <img src="{{ $product->imageurl }}" class="card-img-top" alt="{{ $product->name }}" width="150px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>





        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Your Shopping bag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <form method="post" action="">
                    @csrf
                    <div class="box d-flex">

                        <div class="card mb-3" style="max-width: 540px; ">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://i.pinimg.com/564x/cf/ef/2d/cfef2d1cd8760954aaba68056e8061cd.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>



                                        <div class="number-add-remove  d-flex">
                                            <button class="quantity-btn btn btn-dark" type="button">-</button>
                                            <input type="number" name="quantity" />
                                            <button class="quantity-btn btn btn-dark" type="button">+</button>
                                        </div>

                                        <p class="card-text"><small class="text-body-secondary">Price : $1200</small></p>

                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>

                </form>
            </div>
        @endsection
