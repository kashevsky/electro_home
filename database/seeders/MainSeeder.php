<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'title'=>'Бытовая техника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp'
        ]);

        $sub_category = SubCategory::create([
            'title'=>'Стиральные машины',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        $product = Product::create([
            'title'=>'Стирально-сушильная машина Jackys JW D8542B0BS',
            'image'=>'https://content2.onliner.by/catalog/device/header/a5bf6032d4b4d1fe8b8121407b511c33.jpg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::create([
            'title'=>'Стиральная машина Haier HW65-BP129302B',
            'image'=>'https://content2.onliner.by/catalog/device/header/d37b271d3e852c932893c7ec3b92fc0e.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::create([
            'title'=>'Стиральная машина LG F2J6NNFW',
            'image'=>'https://content2.onliner.by/catalog/device/header/a3dfe83ccc229afd96e4c349169ca285.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Сушки',
            'image'=>'https://i.unishop.by/models/sushilki_dlya_ovoschey_i_fruktov/takara/df-07-1.webp',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Варочные поверхности',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);

    }
}
