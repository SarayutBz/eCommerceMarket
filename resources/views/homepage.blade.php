@extends('layout')
@section('content')


    <div class="img-carousel mx-auto h-100">
        <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel" data-interval="300">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.pinimg.com/originals/2d/4b/f3/2d4bf32e84fe3f38a60a8c0ef2c309d0.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/originals/09/e2/c1/09e2c1f51fbbd2749117819d7d654dbe.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/originals/1a/05/ee/1a05eea9303677bea1e3859120cb22c3.jpg"
                        class="d-block w-100" alt="...">
                </div>
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

        <div class="items">
            <div class="card" style="width: 18rem;">
                <img src="https://i.pinimg.com/564x/07/bc/2c/07bc2ccc437467c321ec33f5dbc5a814.jpg" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="price d-flex">
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                            <i class="text-white fa-solid fa-cart-plus"></i>
                        </a>

                        <div class="text">

                            <p class="m-2 fs-5">$1200</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://i.pinimg.com/564x/d7/7c/82/d77c82e659d7b3d4b46a6f1b8f5625df.jpg" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="price d-flex">

                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                            <i class="text-white fa-solid fa-cart-plus"></i>
                        </a>
                        <div class="text">

                            <p class="m-2 fs-5">$1200</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://i.pinimg.com/564x/81/e3/2b/81e32bd64a3487d061690b48a9897d2f.jpg" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="price d-flex">

                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                            <i class="text-white fa-solid fa-cart-plus"></i>
                        </a>
                        <div class="text">

                            <p class="m-2 fs-5">$1200</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://i.pinimg.com/564x/00/15/73/0015736afc2cb21dba75de1e9c31ddcf.jpg" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="price d-flex">

                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                            <i class="text-white fa-solid fa-cart-plus"></i>
                        </a>
                        <div class="text">

                            <p class="m-2 fs-5">$1200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                        <button class="quantity-btn btn btn-dark" type="button" >+</button>
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
