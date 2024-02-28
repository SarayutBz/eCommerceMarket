<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $jsonData = File::get(storage_path('app/dataTest/test.json'));
        $data = json_decode($jsonData, true);
        return view('admin.Orders', compact('data'));
    }
    public function showOrders(Request $request)
    {
        $jsonData = File::get(storage_path('app/dataTest/test.json'));
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
