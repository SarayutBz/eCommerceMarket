<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

<div class="menu-bar bg-dark">
    <div class="image">
        <a href="{{ route('home') }}"><img src="{{ asset('icon.png') }}"></a>

    </div>
    <div class="bbep-text">
        <a href="{{ route('home') }}">
            <h3 class="text-white  text-center fs-1">BBEP</h3>
        </a>

    </div>


    <form method="get" action="{{route('home')}}"  class="d-flex form-input mt-1" role="search">
        <div class="search-container">
            <input type="search" class="form-control search-input" placeholder="Search" aria-label="Search">
            <i class="fas fa-search search-icon"></i>
        </div>
        <div class="user-bag">
            @auth
                @foreach ($images as $image)
                    <!-- ถ้าล็อกอินอยู่, ให้เปลี่ยนลิงก์ไปยัง 'profile' -->
                    <a href="{{ route('profile') }}">
                        <img src="{{ asset('storage/images/' . $image->filename) }}" alt="">
                        {{-- <img src="{{ asset('storage/images/' . $images->filename) }}" alt=""> --}}
                    </a>
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

{{--
    <h3>Hello {{Auth::user()->name}}</h3>

    <img src="{{$images}}" alt="" srcset="">
    @foreach ($images as $image)
        <img src="{{ asset('storage/images/' . $image->filename) }}" alt="Image">
    @endforeach



    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload Image</button>
    </form>


    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form> --}}

<div class="box-profile d-flex justify-content-center">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                @foreach ($images as $image)
                    <img class="img-fluid rounded-start" src="{{ asset('storage/images/' . $image->filename) }}"
                        alt="Image">
                @endforeach

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">ยินดีต้อนรับคุณ {{ Auth::user()->name }}</h5>
                    <p class="card-text">
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" accept="image/*" required>
                        <button type="submit">Upload Image</button>
                    </form>
                    </p>
                    <p class="card-text"><small class="text-body-secondary">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">logout</button>
                            </form>
                        </small></p>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .user-bag img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .form-input {
        margin: 0;
    }
</style>
