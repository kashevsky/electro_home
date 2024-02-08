<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubCategoryFilter;
use Illuminate\Http\Request;
use Illuminate\SupporT\Str;

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
        $products = $sub_category->products;

        if (!empty($applied_filters)) {
            // foreach ($applied_filters as $name => $applied_filter) {
            //     $parametr = SubCategoryFilter::where('name', $name)->first()->parametr;
            //     dd($products->where('products.haracteristics.parametr', $parametr)
            //     ->whereIn('haracteristics.value', $applied_filter));
            // }
        }

        $product = $products->first();
        $filer_items = SubCategoryFilter::where('sub_category_id', $sub_category->id)->get()
            ->map(function ($item) {
                return $item = [
                    'parametr' => $item->parametr,
                    'type' => $item->type,
                    'name' => $item->name,
                    'products' => $item->subCategory->products,
                    'items' => json_decode($item->items)
                ];
            });
        $haracteristics = $product->haracteristics;

        return view('sub_category.index', compact('products', 'categories', 'sub_category', 'filer_items', 'applied_filters'));
    }
}
