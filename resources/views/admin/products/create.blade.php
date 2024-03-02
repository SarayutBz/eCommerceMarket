@include('layouts.adminHeader')

<div class="container mt-4">
    <h3>Add Product</h3>

    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="imageurl" class="form-label">Product Image URL</label>
            <input type="text" class="form-control" id="imageurl" name="imageurl" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="mb-3">
            <label for="stockquantity" class="form-label">Product Stockquantity</label>
            <input type="text" class="form-control" id="stockquantity" name="stockquantity" required>
        </div>

        <div class="mb-3">
            <label for="categoryID" class="form-label">Product categoryID</label>
            <input type="text" class="form-control" id="categoryID" name="categoryID" required>
        </div>

        <!-- Add form fields for other product attributes -->

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
