<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
class BarController extends Controller
{
    public function BarChart()
    {
        $orderdetails = Order::select(  "totalAmount","stockquantity" )->get();

        $answer[] = ['totalAmount','stockquantity'];

        foreach ($orderdetails as $key => $value) {
            $answer[] = [ $value->totalAmount,$value->stockquantity];
        }

        return view('userchart', compact('answer'));

        
    }
    
}



