<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function openOrderView(){
        $user = \App\Models\User::find(session('userId'));
        return view('order', ['user' => $user]);
    }

    public function order(){
        $orderProducts = session('cart');
        $finalProducts = [];
        $countProducts = [];
        $idProducts = [];
        $whitelist = [];

        foreach($orderProducts as $order){
            $tempCounter = 0;
            if(in_array($order, $whitelist)){
                continue;
            }else{
                foreach($orderProducts as $tempOrder){
                    if($order == $tempOrder){
                        $tempCounter++;
                    }
                }
                array_push($countProducts, $tempCounter);
                array_push($idProducts, $order);
                array_push($whitelist, $order);
                $tempCounter = 0;
            }
        }

        $products = \App\Models\Product::all();

        $price = 0;

        foreach($products as $product){
            foreach($orderProducts as $order){
                if($product->id == $order){
                    $price += $product->price;
                    break;
                }
            }
        }

        DB::insert('INSERT INTO orders (user_id, price) VALUES (?, ?)',
        [session('userId'), $price]);

        $orderId = DB::table('orders')
                    ->where('user_id', session('userId'))
                    ->orWhere('price', $price)
                    ->first();

        foreach($idProducts as $productId){
            $productPrice = \App\Models\Product::find($productId)->price;
            foreach($countProducts as $productCount){
                DB::insert('INSERT INTO order_items (amount, product_id, order_id, price) VALUES (?, ?, ?, ?)',
                [
                intval($productCount),
                intval($productId),
                intval($orderId->id),
                intval($productPrice)
                ]);
            }
        }
        echo 'Die Bestellung ist erfolgreich';
    }

}
