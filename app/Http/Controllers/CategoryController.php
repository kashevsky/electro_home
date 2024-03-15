<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id)
    {
        $category = Category::find($category_id);
        $categories = Category::get();
        $slides = ['/img/baner1.jpg','/img/baner2.jpg'];
        $sub_categories = $category->subCategories;
        return view('category.index', compact('sub_categories','categories','category'));
    }
}
