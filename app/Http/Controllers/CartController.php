<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Image;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        // dd($request);
        //เช็กว่าทำการ login เข้ามาหรือยัง ถ้ายังให้แสดงข้อความนี้
        if (!Auth::check()) {
            return response()->json(['message' => 'กรุณาเข้าสู่ระบบก่อนที่จะเพิ่มรายการในตะกร้า'], 401);
        }

        // ตรวจสอบข้อมูลที่ส่งมา
        $order = $request->validate([
            'productID' => 'required|exists:products,productID',
            'userID' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        // สร้างรายการในตะกร้า
        Cart::create($order);


        // return response()->json(['message' => 'รายการถูกเพิ่มในตะกร้าเรียบร้อยแล้ว', 'data' => $order], 201);
        return redirect()->route('cart');

    }

    public function cart()
    {
        //หาค่า userID มาเก็บที่ userID
        $userID = Auth()->user()->getAttributes()['userID'];
        // ทำการ join เพื่อ เอา สินค้าที่ user แต่ละคนเพิ่งลง ในตระกร้า
        $carts = Cart::join('products', 'cart.productID', '=', 'products.productID')
            ->whereIn('cart.productID', Product::pluck('productID'))
            ->where('cart.userID', $userID) // Filter by userID
            ->select('cart.*', 'products.*')
            ->get();

         //หาค่า userID มาเก็บที่ userID
        $userId = Auth()->user()->getAttributes()['userID'];
        // เอารูป user มาแสดงตรง tab menubar
        $images = Image::where('userID', $userId)->get();


        return view('cart.cart', compact('carts', 'images'));

    }
    public function delete(Request $request)
    {
        // ทำการตรวจสอบข้อมูลที่ส่งมาใน request
        $order = $request->validate([
            'productID' => 'required|exists:products,productID',
            'userID' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        // ทำการแก้ไขคำสั่งเพื่อให้ลบรายการที่ตรงกับ productID และ userID ที่ได้รับจากข้อมูลที่ผ่านการตรวจสอบ.
        Cart::where('productID', $order['productID'])
            ->where('userID', $order['userID'])
            ->delete();

        return redirect('cart');
    }

}
