<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">


<div class="menu-bar d-flex bg-dark">
    <a href="{{route('home')}}"><i class="fa-solid fa-less-than text-white"></i></a>


    <h3 class="text-white text ">BBEP</h3>
    <h3 class="text-black text ">.</h3>


</div>

<div class="box-form text-center">

     {{-- route ไป controller login --}}
    <h3 class="text-center mt-5"> Welcome please sign in.</h3>
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="d-inline justify-content-center mt-4">
            <div class="input-group flex-nowrap w-25 mx-auto mt-5">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
                <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email" required>
            </div>
            <div class="input-group flex-nowrap mt-4 w-25 mx-auto">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
            </div>



        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-dark ">
                <h5> Continue</h5>
            </button>
        </div>
    </form>

    <a href="">
        <h6 class="mt-3">Forgot password ? </h6>
    </a>

    <div class="Question">
        <span>I don't have an account. <a href="{{route('register.r')}}">Create Account.
            </a> </span>
        <div class="mt-4">

            <span class="mt-5">Or</span>
        </div>
    </div>

</div>

<div class="icon-login d-flex justify-content-center">
    <i class="fa-brands fa-google"></i>
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-apple"></i>
</div>
