<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $products = \App\Models\Product::all();
        
        return view('products', ['products' => $products]);
    }

    public function detail($id) {
        $product = \App\Models\Product::find($id); 

        return view('detail', ['product' => $product]);
    }

    public function addToCart($id) {
        if(session('cart') !== null){
            $array = session('cart');
            array_push($array, $id);
            session(['cart' => $array]);
        }else{
            session(['cart' => []]);
        }
    }

    public function openCart(){
        $products = \App\Models\Product::all();
        $cartIds = [1];
        $cartProducts = [];

        foreach($cartIds as $cartId){
            foreach($products as $product){
                if($product->id === $cartId){
                    array_push($cartProducts, $product);
                }else{
                    continue;
                }
            }
        }


        return view('cart', ['products' => $cartProducts]);
    }
}
