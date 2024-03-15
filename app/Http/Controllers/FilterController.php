<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterProducts(Request $request)
    {
        // $params = $request->all();
        // foreach($params as $index=>$param){
        //     if($param == null){
        //         unset($params[$index]);
        //     }
        // }

        // $sub_category = SubCategory::find($params['sub_category_id']);
        // $products = $sub_category->products;
        // $products = $products->map(function ($item) {
        //     return $item = [
        //         'haracteristics'=> $item->haracteristics,
        //     ];
        // });
        // dd($products);
        // $filter = SubCategoryFilter::where('sub_category_id', $sub_category->id)->get();
        // $filtred_products = null;
        // dd($params);
    }
}
