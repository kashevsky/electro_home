<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    //

    public function addToComparison(Request $request)
    {
        $product_id = $request->input('productId');
        $request->session()->push('product_ids', $product_id);
    }

    public function removeFromComparison(Request $request)
    {
        $product_id = $request->input('productId');
        $product_ids = $request->session()->get('product_ids');
        unset($product_ids[array_search($product_id, $product_ids)]);
        $request->session()->put('product_ids', $product_ids);
    }

    public function compare(Request $request)
    {
        $product_ids = $request->session()->get('product_ids');
    }
}
