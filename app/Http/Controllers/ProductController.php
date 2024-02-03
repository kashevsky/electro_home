<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product_id)
    {
        $product = Product::find($product_id);

        return view('product.show', compact('product'));
    }
}
