<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubCategoryFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

        $order = $input['order'] ?? 'products.position:desc';

        unset($input['order']);

        if (!empty($input)) {
            foreach ($input as $filter_name => $filter_values) {
                $products->whereHas('haracteristics', function ($query) use ($filter_name, $filter_values) {
                    $parametr = SubCategoryFilter::where('name', $filter_name)->first()->parametr;
                    $query->where('parametr', $parametr)
                        ->where(function ($query) use ($filter_values) {
                            if (Arr::has($filter_values, 'from') || Arr::has($filter_values, 'to')) {
                                $query->orWhere(function ($query) use ($filter_values) {
                                    if (Arr::has($filter_values, 'from')) {
                                        $query->where('value', '>=', intval(Arr::get($filter_values, 'from')));
                                    }

                                    if (Arr::has($filter_values, 'to')) {
                                        $query->where('value', '<=', intval(Arr::get($filter_values, 'to')));
                                    }
                                });
                            } else {
                                foreach ($filter_values as $filter_value) {
                                    $query->orWhere('value', $filter_value);
                                }
                            }
                        });
                });
            }

            $products->groupBy('products.id');
        }

        if ($order) {
            list($col, $direction) = explode(':', $order);
            $products->orderBy($col, $direction);
        }

        return json_encode([
            'products' => $products->get()
        ]);
    }
}
