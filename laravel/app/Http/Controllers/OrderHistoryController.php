<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function openOrdersView(){
        $orders = DB::table('orders')->get();
        $finalOrders = [];
        foreach($orders as $order){
            if($order->user_id == session('userId')){
                array_push($finalOrders, $order);
            }
        }

        return view('orderhistory', ['orders' => $finalOrders]);
    }
}
