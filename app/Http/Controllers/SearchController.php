<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function searchByQuery(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $products = Product::where('products.title', 'like', "%{$query}%")->get();

            $subCategories = $products->pluck('sub_category_id');

            $subCategories = SubCategory::join('products', 'sub_categories.id', 'products.sub_category_id')
                ->whereIn('sub_categories.id', $subCategories)
                ->select(DB::raw('count(*) as total'), 'sub_categories.id', 'sub_categories.title')
                ->groupBy('sub_categories.id')
                ->get();

            $searchResults = [
                'products' => $products,
                'subCategories' => $subCategories
            ];
        } else {
            $searchResults = [];
        }

        return json_encode([
            'searchResults' => $searchResults
        ]);
    }
}
