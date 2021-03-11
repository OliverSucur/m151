<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id) {
        $product = \App\Models\Product::find($id);
    }
}
