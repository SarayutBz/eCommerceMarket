<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">



    <title>Bbep Shop</title>
</head>

<body>


    <div class="menu-bar bg-dark">
        <div class="image">
            <a class="my-2" href="{{ route('home') }}"><img src="{{ asset('icon.png') }}"></a>

        </div>
        <div class="bbep-text">
            <a href="{{ route('home') }}">
                <h3 class="text-white  text-center fs-1">BBEP</h3>
            </a>

        </div>


        <form class="d-flex form-input" role="search">
            <div class="search-container">
                <input type="search" class="form-control search-input" placeholder="Search" aria-label="Search" name="search">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="user-bag">
                @auth
                    <!-- ถ้าล็อกอินอยู่, ให้เปลี่ยนลิงก์ไปยัง 'profile' -->
                    @foreach ($images as $image)
                        @if ($image)
                            <a href="{{ route('profile') }}">
                                <img src="{{ asset('storage/images/' . $image->filename) }}" alt="">
                            </a>
                        @else
                            <i class="text-white fa-solid fa-cart-shopping"></i>
                        @endif
                    @endforeach
                    <a href="{{ route('cart') }}">
                        <i class="text-white fa-solid fa-cart-shopping"></i>
                    </a>
                @else
                    <!-- ถ้ายังไม่ล็อกอิน, ให้เปลี่ยนลิงก์ไปยัง 'login.l' -->
                    <a href="{{ route('login.l') }}"><i class="text-white fa-regular fa-circle-user"></i></a>
                    <a href="{{ route('login.l') }}">
                        <i class="text-white fa-solid fa-cart-shopping"></i>
                    </a>
                @endauth


            </div>
        </form>
    </div>

    <div class="submenu-bar d-flex">
        <a href="">
            <p class="">Beauty | </p>
        </a>
        <a href="">
            <p class="">Life style | </p>
        </a>
        <a href="">
            <p class="">Giffs set | </p>
        </a>
        <a href="">
            <p class="">Promotions | </p>
        </a>

        <hr>
    </div>

    <div class="container">

        @yield('content')

    </div>




</body>

</html>
