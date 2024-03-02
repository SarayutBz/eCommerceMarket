@include('layouts.adminHeader')


    <div class="container mt-4">
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



            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
