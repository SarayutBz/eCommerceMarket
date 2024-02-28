<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h3>Hello {{Auth::user()->name}}</h3>
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
</body>

</html>
