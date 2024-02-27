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


    <form method="get" action="{{ route('home') }}" class="d-flex form-input mt-1" role="search">
        <div class="search-container">
            <input type="search" class="form-control search-input" placeholder="Search" aria-label="Search">
            <i class="fas fa-search search-icon"></i>
        </div>
        <div class="user-bag">

            @auth
                @if ($images->isNotEmpty())
                    @foreach ($images as $image)
                        <a href="{{ route('profile') }}">
                            <img src="{{ asset('storage/images/' . $image->filename) }}" alt="">
                        </a>
                    @endforeach
                @else
                    <a href="{{ route('profile') }}">
                        <img src="https://i.pinimg.com/564x/98/49/c6/9849c6bf0f1338a3ea9b2eca412c9791.jpg" alt="">
                    </a>
                @endif


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
                @if ($images->isNotEmpty())
                        @foreach ($images as $image)
                            <a href="{{ route('profile') }}">
                                <img src="{{ asset('storage/images/' . $image->filename) }}" alt="">
                            </a>
                        @endforeach
                    @else
                        <a href="{{ route('profile') }}">
                            <img src="https://i.pinimg.com/564x/98/49/c6/9849c6bf0f1338a3ea9b2eca412c9791.jpg"
                                alt="">
                        </a>
                    @endif

            </div>
            <div class="col-md-8">
                <div class="card-body">

                    {{-- <input type="email" name="email" value="{{ old( Auth::user()->email) }}"> --}}
                    <h5 class="card-title">ยินดีต้อนรับคุณ <p class="fw-bold">{{ Auth::user()->name }} </p> </h5>
                    <h3>{{ Auth::user()->email}}</h3>

                    <form method="POST" action="{{route('update')}}">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
                        {{-- <input type="text" name="name" value="{{ old('name', Auth::user()->userID) }}"> --}}
                        <button type="submit">chang name</button>
                    </form>

                    <form method="POST" action="{{route('deleteAccount')}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden"  name="userID" value="{{ old('name', Auth::user()->userID) }}">
                        <input type="hidden"  name="name" value="{{ old('name', Auth::user()->name) }}">
                        <input type="hidden"  name="email" value="{{ old('name', Auth::user()->email) }}">
                        <button type="submit">delete accoutn</button>
                    </form>

                    <p class="card-text">

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
