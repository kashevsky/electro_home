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
            $products = Product::where('products.title', 'like', "%{$query}%")
                ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
                ->orWhere('sub_categories.title', 'like', "%{$query}%")
                ->select('products.*')
                ->get();

            $subCategories = $products->pluck('sub_category_id');

            $subCategories = SubCategory::join('products', 'sub_categories.id', 'products.sub_category_id')
                ->whereIn('sub_categories.id', $subCategories)
                ->select(DB::raw('count(*) as total'), 'sub_categories.id', 'sub_categories.title')
                ->groupBy('sub_categories.id')
                ->orderBy('total', 'desc')
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

    public function searchProducts(Request $request, $sub_category_id)
    {
        $input = $request->all();

        $products = Product::join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
            ->where('products.sub_category_id', $sub_category_id)
            ->select('products.*');

        if (!empty($input)) {
            $products->whereHas('haracteristics', function ($query) use ($input) {
                foreach ($input as $name => $filter) {
                    $query->where(function ($query) use ($name, $filter) {
                        $query->where('parametr', $name);
                        foreach ($filter as $value) {
                            $query->orWhere('value', $value);
                        }
                    });
                }
            });
        }

        return json_encode([
            'products' => $products->get()
        ]);
    }
}
