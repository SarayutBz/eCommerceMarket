<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        // dd($request);
        if (!Auth::check()) {
            return response()->json(['message' => 'กรุณาเข้าสู่ระบบก่อนที่จะเพิ่มรายการในตะกร้า'], 401);
        }

        // ตรวจสอบข้อมูลที่ส่งมา
        $order = $request->validate([
            'productID' => 'required|exists:products,productID',
            'userID'=>'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        // สร้างรายการในตะกร้า
        Cart::create($order);

        // return response()->json(['message' => 'รายการถูกเพิ่มในตะกร้าเรียบร้อยแล้ว', 'data' => $order], 201);
        return redirect()->route('cart');

    }

    public function cart(){
        $carts = Cart::join('products', 'cart.productID', '=', 'products.productID')
        ->whereIn('cart.productID', Product::pluck('productID'))
        ->select('cart.*', 'products.*') // You can select specific columns from both tables
        ->get();

    // return response()->json(['data' => $carts]);


    return view('cart.cart', compact('carts'));

    }
}
