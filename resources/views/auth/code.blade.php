<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">

<body style="height: max-content;">
    @extends('layout')
    @section('content')
    <div class="card-code">
        <h4 style="margin-bottom: 20px;"> เรารหัสไปยัง E-mail ของคุณแล้ว</h4>
        <form method="POST" action="{{ route('reset') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email : </label>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Code : </label>
                <input type="text" name="code" placeholder="Code" required>
            </div>
            <div class="btn-forgot-group">
                <button class="btn-sand" type="submit">send</button>
            </div>
        </form>

        <a class="rq-code" href="{{route('forgotpassword')}}">ต้องการให้ส่งรหัสอีกครั้ง</a>

        @endsection
    </div>
</body>