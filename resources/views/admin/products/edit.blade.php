<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Orders</title>
    <script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>

<body style="height: max-content;">
    @include('layouts.adminHeader')
    <div class="main-addpage">
        <h3>Edit Product</h3>

        <form action="{{ route('products.update', $product) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label for="imageurl" class="form-label">Product Image URL</label>
                <input type="text" class="form-control" id="imageurl" name="imageurl" value="{{ $product->imageurl }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Product stockquantity</label>
                <input type="text" class="form-control" id="stock" name="stockquantity" value="{{ $product->stockquantity }}">
            </div>


            <div class="btn-add-group">
                <button type="submit" class="btn-add-product">Update Product</button>
                <a href="{{route('Orders')}}"><button type="button" class="btn-cancle">cancle</button> </a>
            </div>
        </form>
    </div>
</body>

</html>