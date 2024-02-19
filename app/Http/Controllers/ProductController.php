<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product_id)
    {
        $product = Product::find($product_id);
        $slides = $product->slides;
        $first_slide = $slides->shift();
        $categories = Category::get();
        return view('product.show', compact('product','categories','slides','first_slide'));
    }
}
