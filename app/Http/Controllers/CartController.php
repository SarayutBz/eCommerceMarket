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
        $userID = Auth()->user()->getAttributes()['userID'];

        $carts = Cart::join('products', 'cart.productID', '=', 'products.productID')
            ->whereIn('cart.productID', Product::pluck('productID'))
            ->where('cart.userID', $userID) // Filter by userID
            ->select('cart.*', 'products.*')
            ->get();

        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();

        if ($carts->isEmpty()) {
            // dd($carts->isEmpty());
            return view('cart.cart', compact('carts', 'images'));
        }

        // return response()->json(['data' => $carts]);


        return view('cart.cart', compact('carts', 'images'));

    }
    public function delete(Request $request)
    {
        $order = $request->validate([
            'productID' => 'required|exists:products,productID',
            'userID' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        // Modify the query to match 'userID' instead of 'productID'
        Cart::where('productID', $order['productID'])
            ->where('userID', $order['userID'])
            ->delete();

        return redirect('cart');
    }
    public function getAllItems()
    {
        // $cartItems = Cart::all();
        // $userId = auth()->user()->userID;
        // $userId = auth()->user()->id;
        // $cartItems = Cart::where('userID', $userId)
        //     ->select('productID', 'userID', 'quantity', DB::raw('SUM(price) OVER () as total'))
        //     ->get();
    //     $totalPrice = Cart::where('userID', $userId)->sum('price');
    //    $order= order::create([
    //         'userID' => $userId,
    //         'totalAmount' => $totalPrice,
    //         'orederstatus' => 'รอตรวจสอบการชำระเงิน'
    //     ]);

        // return response()->json($order);
    }

}
