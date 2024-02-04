<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id)
    {
        $category = Category::find($category_id);
        $sub_categories = $category->subCategories;
        return view('category.index', compact('sub_categories'));
    }
}