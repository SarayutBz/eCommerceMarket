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


<div class="image">

    <img src="" alt="" srcset="">
</div>

<div class="payments d-flex justify-content-center mt-5">
    <img src="{{ asset('payments/pay.jpg') }}" alt="">
    {{-- <h3>{{$personal[]}}</h3> --}}


        <form method="POST" action="{{ route('paymentpost') }}" enctype="multipart/form-data">
            @csrf

            <div class="insert inline-block  mx-4">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">📝</span>
                    <input type="text" class="form-control" placeholder="First name" name="fname"
                        aria-label="Username" aria-describedby="basic-addon1"  required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">📝</span>
                    <input type="text" class="form-control" placeholder="Last name" name="lname"
                        aria-label="Username" aria-describedby="basic-addon1"  required>
                </div>

                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">📞</span>
                    <input type="text" class="form-control" placeholder="phone number" aria-label="Username"
                        aria-describedby="addon-wrapping"  name="phonenumber"
                        required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">🏡</span>
                    <input type="text" class="form-control" placeholder="Adress" aria-label="Username"
                        aria-describedby="basic-addon1"  name="adress" required>
                </div>

                <label class="text-center my-2" for="">Upload bill</label>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input class="form-control" type="file" name="filename" accept="image/*" required>
                </div>
                <input type="hidden" type="numer" name="userID" value="{{Auth::user()->userID}}">

                <button type="submit" class="btn btn-dark">Send</button>
            </div>
</div>

</form>



<style>
    .payments img {
        width: 400px;
        height: 600px;
    }
</style>
