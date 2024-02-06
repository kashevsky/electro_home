<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        $categories = Category::get();
        $products = $sub_category->products;
        $product = $products->first();
        $haracteristics = $product->haracteristics;
        return view('sub_category.index', compact('products','categories','sub_category','haracteristics'));
    }
}
