<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    //

    public function addToComparison(Request $request)
    {
        $product_id = $request->input('productId');
        $request->session()->push('product_ids', $product_id);

        return json_encode([
            'items' => array_values($request->session()->get('product_ids'))
        ]);
    }

    public function removeFromComparison(Request $request)
    {
        $product_id = $request->input('productId');
        $product_ids = $request->session()->get('product_ids');
        unset($product_ids[array_search($product_id, $product_ids)]);
        $request->session()->put('product_ids', $product_ids);

        return json_encode([
            'items' => array_values($product_ids)
        ]);
    }

    public function compare($products)
    {
        $product_ids = explode('+', $products);
        $products = Product::whereIn('id', $product_ids)->get();
        $categories = Category::get();

        return view('compare.index', compact('products', 'categories'));
    }
}
