<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;

class StockController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลจากตาราง 'stock' และ 'products' โดยใช้ Eloquent ORM
        $stocks = stock::join('products', 'stock.productID', '=', 'products.productID')
        ->select('stock.*', 'products.name as product_name', 'products.categoryID')
        ->get();
        return view('admin.Stock', compact('stocks'));
    }
}
