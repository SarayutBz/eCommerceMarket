<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::all();
        return response()->json(['message' => 'สำรเ็จ', 'prodcut' => $product]);
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'stockquantity' => 'required|string',
            'description' => 'required|string',
            'categoryID' => 'required|string',

            'imageurl' => 'required|url',
        ]);

        Product::create($request->all());

        return redirect()->route('stock')->with('success', 'Product added successfully');
    }
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $val = $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'stockquantity' => 'required|string',
            'imageurl' => 'required|url',

        ]);
        // dd($product);
        $product->update($val);

        return redirect()->route('stock')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();
        return redirect()->route('stock')->with('success', 'Product deleted successfully');
    }
}
