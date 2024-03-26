<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Characteristic;
use App\Models\CharacteristicGroup;
use App\Models\Product;
use Illuminate\Support\Arr;

class SubCategoryController extends Controller
{
    public function index($category_id)
    {
        if (!empty($_GET)) {
            $applied_filters = $_GET;
        } else {
            $applied_filters = [];
        }

        $categories = Category::get();

        $category = Category::find($category_id);

        $products = Product::select('products.*')
            ->with('characteristics', function ($query) {
                $query
                    ->join('characteristics', 'products_characteristics.characteristic_id', 'characteristics.id')
                    ->join('characteristics_groups', 'characteristics.group_id', 'characteristics_groups.id');
            })
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('products.category_id', $category_id)
            ->groupBy('products.id');

        $products = $products->get()->map(function ($product) {
            $characteristics_groups = $product->characteristics->groupBy('group_id')->toArray();
            $result = [];
            foreach ($characteristics_groups as $characteristics_group => $values) {
                $result[CharacteristicGroup::find($characteristics_group)->title] = collect($values)->map(function ($item) {
                    $item['title'] = Characteristic::find($item['characteristic_id'])->title;
                    return $item;
                });
            }

            $product->characteristics = $result;

            return $product;
        });
        dd($products->first());
        $order = $applied_filters['order'] ?? 'products.position:desc';

        unset($applied_filters['order']);

        if ($order) {
            list($col, $direction) = explode(':', $order);
            // $products->orderBy($col, $direction);
        }

        // $products = $products->get();

        $product = $products->first();

        $filer_items = [];

        $comparable_items = session()->get('product_ids');
        if (is_array($comparable_items)) {
            $comparable_items = array_values(array_unique($comparable_items));
        }

        return view('sub_category.index', compact('products', 'categories', 'filer_items', 'category', 'comparable_items'));
    }
}
