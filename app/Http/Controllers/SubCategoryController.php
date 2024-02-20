<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubCategoryFilter;
use Illuminate\Support\Arr;

class SubCategoryController extends Controller
{
    public function index($sub_category_id)
    {
        if (!empty($_GET)) {
            $applied_filters = $_GET;
        } else {
            $applied_filters = [];
        }

        $sub_category = SubCategory::find($sub_category_id);
        $categories = Category::get();

        $products = Product::join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
            ->where('products.sub_category_id', $sub_category_id)
            ->select('products.*');

        $order = $applied_filters['order'] ?? 'products.position:desc';

        unset($applied_filters['order']);

        if (!empty($applied_filters)) {
            foreach ($applied_filters as $filter_name => $filter_values) {
                $products->whereHas('haracteristics', function ($query) use ($filter_name, $filter_values) {
                    $parametr = SubCategoryFilter::where('name', $filter_name)->first()->parametr;
                    $query->where('parametr', $parametr)
                        ->where(function ($query) use ($filter_values) {
                            if (Arr::has($filter_values, 'from') || Arr::has($filter_values, 'to')) {
                                $query->orWhere(function ($query) use ($filter_values) {
                                    if (Arr::has($filter_values, 'from')) {
                                        $query->where('value', '>=', Arr::get($filter_values, 'from'));
                                    }

                                    if (Arr::has($filter_values, 'to')) {
                                        $query->where('value', '<=', Arr::get($filter_values, 'to'));
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

        $products = $products->get();

        $product = $products->first();

        $filer_items = SubCategoryFilter::where('sub_category_id', $sub_category->id)->get()
            ->map(function ($item) {
                return $item = [
                    'parametr' => $item->parametr,
                    'type' => $item->type,
                    'name' => $item->name,
                    'is_ranged' => $item->is_ranged,
                    'products' => $item->subCategory->products,
                    'items' => json_decode($item->items)
                ];
            });

        $haracteristics = $product->haracteristics;

        return view('sub_category.index', compact('products', 'categories', 'sub_category', 'filer_items'));
    }
}
