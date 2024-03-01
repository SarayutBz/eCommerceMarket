<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Orders</title>
    <script src="https://kit.fontawesome.com/037a863ff4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>

<body class="body">
    @include('layouts.adminHeader')
    <main class="Main_body">
        @include('layouts.btnGroup')
        <h1 class="title_text">ORDERS</h1>
        <div class="container">
            <div class="tool_bar">
                <a href="{{ route('orders.waiting') }}" class="tool_btn">
                    waiting of delivery
                </a>
                <a href="{{ route('orders.shipping') }}" class="tool_btn">
                    currently shipping
                </a>
                <a href="{{ route('orders.success') }}" class="tool_btn">
                    successfully
                </a>
                <a href="{{ route('orders.cancel') }}" class="tool_btn">
                    cancel shipping
                </a>
            </div>
            <h1 style="text-decoration: underline;margin: 10px; ">currently shipping</h1>

            <div class="table-data">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">price</th>
                            <th scope="col">address</th>
                            <th scope="col">Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                        @foreach ($data as $order)
                        <tr>
                            <td>{{ $order->orderID }}</td>
                            <td>{{ $order->userID }}</td>
                            <td>{{ $order->totalAmount }}</td>
                            <td>----</td>
                            <td class="col-ta">--------------------------------------------</td>
                            <td>currently shipping</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">No orders found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>