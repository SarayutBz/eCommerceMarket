<!---Orders.blade-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Orders</title>
    <script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>

<body style="height: max-content;">
    @include('layouts.adminHeader')

    <div class="container mt-4">
        <h3>Product List</h3>

        <div class="new-product d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"></i> New </a>
        </div>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock Quantity</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->productID }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ $product->imageurl }}" alt="" srcset="" width="50px" height="50px"></td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ $product->stockquantity }}</td>
                        <td><a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a></td>
                        <td> <form action="{{ route('products.destroy', $product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>
<style>
    .table-data {
        margin-left: 100px;
    }
</style>
