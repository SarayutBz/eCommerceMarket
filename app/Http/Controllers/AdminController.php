<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stock(){
     $products=   Product::orderBy('productID')->get();
        return view('admin.stock',compact('products'));
    }
    public function order(){
     $products=   order::orderBy('orderID')->get();
        return view('admin.Order',compact('products'));
    }
    public function saless(){
     $products=   Product::orderBy('productID')->get();
        return view('admin.Saless',compact('products'));
    }
    public function check(){
     $products=   Product::orderBy('productID')->get();
        return view('admin.Check',compact('products'));
    }
}
