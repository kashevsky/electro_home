<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->get();
        $products_in_sale = Product::where('is_sale', 1)->get()->take(10);
        return view('index', compact('categories', 'products_in_sale'));
    }
}
