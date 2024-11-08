<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function waiting(Request $request)
    {
        $data = Order::where('orederstatus', 1)->get();
        return view('admin.waiting', compact('data'));
    }

    public function shipping(Request $request)
    {
        $data = Order::where('orederstatus', 2)->get();
        return view('admin.currently', compact('data'));
    }

    public function success(Request $request)
    {
        $data = Order::where('orederstatus', 3)->get();
        return view('admin.successfully', compact('data'));
    }

    public function cancel(Request $request)
    {
        $data = Order::where('orederstatus', 0)->get();
        return view('admin.cancel', compact('data'));
    }
}
