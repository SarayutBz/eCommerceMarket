@extends('layout')
@section('content')
<script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

{{-- <link rel="stylesheet" href="{{ asset('css/loginpage.css') }}"> --}}
    <h3 class="text-center">แก้ไขรหัส</h3>

    <form method="post" action="{{route('UpdatePassword')}}">
        @csrf
        <div class="d-inline justify-content-center mt-4 text-center" >

            <div class="input-group flex-nowrap w-25 mx-auto mt-5">

                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email" required>
            </div>

            <div class="input-group flex-nowrap mt-4 w-25 mx-auto">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
            </div>

            <div class="input-group flex-nowrap mt-4 w-25 mx-auto">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-repeat"></i></i></span>
                <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Password Confirm" required>

            </div>


            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-dark ">
                    <h5>Continue</h5>
                </button>
            </form>
<style>
    a{
        list-style: none;
        text-decoration: none;
    }
</style>
@endsection
