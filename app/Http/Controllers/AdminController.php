<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stock()
    {
        // ทำการดึงข้อมูล product มาเก็บใน $products
        $products = Product::orderBy('productID')->get();
        return view('admin.stock', compact('products'));
    }


}
