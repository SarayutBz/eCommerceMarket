<!-- resources/views/stocks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
</head>
<body>
    <h1>Stocks</h1>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Stock Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->productID }}</td>
                    <td>{{ $stock->product->productName }}</td>
                    <td>{{ $stock->stockquantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
