<!-- resources/views/images/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload</title>
</head>
<body>

    <h2>Image Gallery</h2>
@auth
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <input hidden type="text" name="userID" value="{{ $userAttributes['userID'] }}"> --}}
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload Image</button>
    </form>
    @endauth

    @foreach($images as $image)
        <img src="{{ asset('storage/images/' . $image->filename) }}" alt="Image">
    @endforeach

</body>
</html>
