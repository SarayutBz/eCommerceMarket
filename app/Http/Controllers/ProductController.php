<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Product = Product::all();
	 return $Product;
    }


    /**
     * Show the form for creating a new resource.
     */
    
public function create(Request $request)
{
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productID' => 'required|digits:15|unique:products',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:50',
            'price' => 'required|integer|max:1000',
            'stockquantity' => 'required|integer|max:50',            
            'imageurl' => 'required|url|max:255',
            'categoryID'=> 'required|digits:3|',
        ]);
        
        Product::create($validated);

    return response()->json(['message' => 'Products created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $productID)
    {
        return response()->json(['data'=>$productID]);
        
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 

public function update(Request $request, $productID)
{
    // ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stockquantity' => 'required|integer|min:0',
        'imageurl' => 'required|url|max:255',
        'categoryID' => 'required|integer|min:0',
    ]);

    // ค้นหาสินค้าที่ต้องการอัปเดต
    $product = Product::find($productID);

    // ตรวจสอบว่าพบสินค้าหรือไม่
    if (!$product) {
        return response()->json(['message' => 'ไม่พบสินค้า'], 404);
    }

    // อัปเดตข้อมูลสินค้า
    $product->update($validated);

    // ดึงข้อมูลสินค้าที่อัปเดตเพื่อส่งกลับ
    $updatedProduct = Product::find($productID);

    // ส่ง JSON response แสดงว่าอัปเดตข้อมูลสินค้าสำเร็จพร้อมกับข้อมูลที่อัปเดต
    return response()->json(['message' => 'อัปเดตข้อมูลสินค้าเรียบร้อย', 'data' => $updatedProduct], 200);
}

    
    /**
     * Remove the specified resource from storage.
     */
  

    

     public function destroy(Product $product, $variable)
     {
         $deleterow = DB::table('Products')
         ->where('productID', $variable)
         ->orWhere('name', $variable)
         ->orWhere('description', $variable)
         ->orWhere('price', $variable)
         ->orWhere('stockquantity', $variable)
         ->orWhere('imageurl', $variable)
         ->orWhere('categoryID', $variable)
         ->delete();
 
     return response()->json(['message' => 'Product delete successfully', 'data' => $product], 200);
     }
     
     
    
}