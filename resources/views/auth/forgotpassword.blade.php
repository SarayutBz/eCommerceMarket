<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">



<body style="height: max-content;">
    <div class="menu-bar d-flex bg-dark">
        <a href="{{ route('home') }}"><i class="fa-solid fa-less-than text-white"></i></a>
        <h3 class="text-white text ">BBEP</h3>
        <h3 class="text-black text ">.</h3>
    </div>
    <div class="card-forgot">
        <div class="title-forgot">Forgot Password ?</div>

        <form method="POST" action="{{ route('send') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Enter your Email. </label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="btn-forgot-group">
                <button type="submit" class="btn-sand">
                    Send
                </button>
            </div>
        </form>


    </div>

</body>