<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\payment;
use App\Models\personalUser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class paymentController extends Controller
{
    public function showForm()
    {
        $user = auth()->user();
        // หา personal ตาม userID มาแสดงหน่อย
        $personal = personalUser::where('userID', $user->id)->get();

        return view('auth.payment', compact("personal"));
    }
    public function paymentapi(Request $request)
    {
        try {

            $userID = Auth::user()->userID;

            // dd($userID);
            $user = $request->validateWithBag('json', [
                'userID' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'adress' => 'required',
                'phonenumber' => 'required',
                'filename' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // return response('success validate');
            $quantity = Cart::where('userID', $userID)->pluck('quantity')->first();
            // dd($quantity);
            // $quantity = (int) $quantity;
            // $quantity = 2;

            $personalUserData = $request->except('filename');
            $personalUser = personalUser::create($personalUserData);

            $imageName = time() . '.' . $request->filename->extension();
            $request->filename->move(public_path('payments'), $imageName);
            $totalAmount = Cart::where('userID', $userID)->pluck('price')->first();
            $result = $totalAmount * $quantity;
            // dd($result);
            $order = order::create([
                'userID' => $userID,
            ]);
            // dd($order);
            $orderID = order::where('userID', $userID)->pluck('orderID')->first();
            $productIDs = Cart::where('userID', $userID)->pluck('productID');
            // $quantity = Cart::where('userID', $userID)->pluck('quantity');
            // $stockquantity = Product::where('productID', $productIDs)->pluck('stockquantity');
            // dd($stockquantity);
            foreach ($productIDs as $productID) {
                $product = Product::find($productID);
                // dd($product);
                // Assuming you have an OrderDetail model
                OrderDetail::create([
                    'userID' => $userID,
                    'orderID' => $orderID,
                    'productID' => $productID,
                    'quantity' => $quantity,
                    'price' => $result,
                    'unitprice' => $totalAmount,
                ]);
                $stockquantity = Product::where('productID', $productIDs)->pluck('stockquantity');
                $newQuantity = $stockquantity[0] - $quantity;
                // dd($newQuantity);
                $product->update([
                    'stockquantity'=>$newQuantity,
                ]);
            }


            $status = 0;
            $payment = payment::create([
                'status' => $status,
                'filename' => $imageName,
                'price' => $result,
                'userID' => $userID
            ]);

            $carts = Cart::join('products', 'cart.productID', '=', 'products.productID')
            ->whereIn('cart.productID', Product::pluck('productID'))
            ->where('cart.userID', $userID) // Filter by userID
            ->select('cart.*', 'products.*')
            ->get();

            Cart::destroy($carts);

            return redirect()->route('home');
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }


        // return redirect()->route('home');
        // return redirect('/home');
    }

}
