<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryFilter;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        $categories = Category::get();
        $products = $sub_category->products;
        $product = $products->first();
        $filer_items = SubCategoryFilter::where('sub_category_id',$sub_category->id)->get()
        ->map(function ($item) {
            return $item = [
                'parametr'=>$item->parametr,
                'type'=> $item->type,
                'products'=>$item->subCategory->products,
                'items'=> json_decode($item->items)
            ];
        });
        $haracteristics = $product->haracteristics;
        return view('sub_category.index', compact('products','categories','sub_category','filer_items'));
    }
}
