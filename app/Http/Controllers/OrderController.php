<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderdetail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::join('orderdetails', 'orders.orderID', '=', 'orderdetails.orderID')
        ->Join('payments', 'orderdetails.price', '=', 'payments.price')
        ->get(['orders.*', 'orderdetails.*','payments.status']);

        // dd($order);

        return view('admin.Orders', compact('order'));
    }
    public function showOrders(Request $request)
    {
        $jsonData = File::get(storage_path('test.json'));
        $data = json_decode($jsonData, true);
        $status = $request->input('status');
        $filteredOrders = collect($data['order'])->filter(function ($order) use ($status) {
            return $order['orderstatus'] === $status;
        });
        if ($filteredOrders->isEmpty()) {
            return view('admin.Orders', ['data' => $data, 'message' => 'ไม่พบข้อมูล', 'status' => $status]);
        } else {
            return view('admin.Orders', ['data' => $data, 'orders' => $filteredOrders, 'status' => $status]);
        }
    }
}
