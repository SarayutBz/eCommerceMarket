<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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
        //ทำการ validate ข้อมูลที่ส่งมาใน request เพื่อตรวจสอบความถูกต้อง.
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'stockquantity' => 'required|string',
            'description' => 'required|string',
            'categoryID' => 'required|string',
            'categoryname' => 'required|string',

            'imageurl' => 'required|url',
        ]);
        //สร้าง Category ใหม่
        Categories::create(['categoryname' => $request->categoryname]);
        // สร้าง Product ใหม่
        Product::create($request->except('categoryname'));

        return redirect()->route('Orders')->with('success', 'Product added successfully');
    }
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        //ทำการ validate ข้อมูลที่ส่งมาใน request เพื่อตรวจสอบความถูกต้อง.
        $val = $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'stockquantity' => 'required|string',
            'imageurl' => 'required|url',

        ]);
        // dd($product);
        //update ค่า
        $product->update($val);

        return redirect()->route('Orders')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // dd($product);
        // ลบสินค้าออก
        $product->delete();
        return redirect()->route('Orders')->with('success', 'Product deleted successfully');
    }
}
