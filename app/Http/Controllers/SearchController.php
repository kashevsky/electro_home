<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchByQuery(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $results = Product::join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
                ->join('categories', 'sub_categories.category_id', 'categories.id')
                ->where('products.title', 'like', "%{$query}%")
                ->orWhere('sub_categories.title', 'like', "%{$query}%")
                ->orWhere('categories.title', 'like', "%{$query}%")
                ->select('categories.title as category_title', 'sub_categories.title as sub_category_title', 'products.title as product_title', 'products.id as product_id')
                ->get()->map(function ($item) {
                    $item->product = [
                        'id' => $item->product_id,
                        'title' => $item->product_title
                    ];

                    return $item;
                });
        } else {
            $results = [];
        }

        return json_encode([
            'results' => $results
        ]);
    }
}
