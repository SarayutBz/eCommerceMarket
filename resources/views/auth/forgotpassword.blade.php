<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">

<div class="menu-bar d-flex bg-dark">
    <a href="{{ route('home') }}"><i class="fa-solid fa-less-than text-white"></i></a>


    <h3 class="text-white text ">BBEP</h3>
    <h3 class="text-black text ">.</h3>


</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Forgot Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group w-50 mt-2">
                            <button type="submit" class="btn btn-dark">
                                Send
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
