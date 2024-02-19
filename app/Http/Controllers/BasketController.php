<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\BasketProduct;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $params = $request->all();
        $session_id = session()->getId();
        $basket = Basket::where('session_id', $session_id)->whereNull('is_confirmed')->first();
        $product = Product::find($params['product_id']);

        if(isset($basket)){
            $current_product = $basket->products()->where('title', $product->title)->first();
            if (isset($current_product)){
                $current_product->count += $params['product_count'];
                $current_product->save();
            }
            else{
                BasketProduct::create([
                    'title' => $product->title,
                    'basket_id' => $basket->id,
                    'count' => $params['product_count']
                ]);
            }
        }
        else{
            $basket = Basket::create([
                'session_id' => $session_id,
            ]);
            BasketProduct::create([
                'title' => $product->title,
                'basket_id' => $basket->id,
                'count' => $params['product_count']
            ]);
        }
        $counts = $basket->products->pluck('count');
        $counter = null;
        foreach($counts as $count){
            $counter += $count;
        }
        session()->put('counter', $counter);
        return json_encode([
            'count' => $counter
        ]);
    }

    public function test()
    {
        session()->flush();
        return redirect()->back();
    }
}
