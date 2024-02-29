<!---Orders.blade-->

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

<body style="height: max-content;">
    @include('layouts.adminHeader')

    <main class="Main_body">
        @include('layouts.btnGroup')
        <h1 class="title_text">ORDERS</h1>
        <div class="container">
            <form action="{{ route('orders.show') }}" method="GET" class="tool_bar">
                @csrf
                <button class="tool_btn" type="submit" name="status" value="waiting of delivery"  @if(!isset($status) || $status == 'waiting of delivery') selected @endif>
                    waiting of delivery
                </button>
                <button class="tool_btn" type="submit" name="status" value="currently shipping">
                    currently shipping
                </button>
                <button class="tool_btn" type="submit" name="status" value="successfully">
                    successfully
                </button>
                <button class="tool_btn" name="status" value="cancel shipping">
                    cancel shipping
                </button>
            </form>
            @if(isset($status))
            <h1 style="text-decoration: underline;margin: 10px; ">{{ $status }}</h1>

            <div class="table-data">
                @if(isset($message))
                <p>{{ $message }}</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($orders) && count($orders) > 0)
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['orderID'] }}</td>
                            <td>{{ $order['userID'] }}</td>
                            <td>{{ $order['totalAmount'] }}</td>
                            <td>{{ $order['orderstatus'] }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @endif
            </div>
            @endif
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>