<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        $products = $sub_category->products;
        return view('sub_category.index', compact('products'));
    }
}
