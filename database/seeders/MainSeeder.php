<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Haracteristic;
use App\Models\SubCategory;
use App\Models\SubCategoryFilter;
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
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/bt.svg',
        ]);

        $sub_category = SubCategory::create([
            'title'=>'Стиральные машины',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        SubCategoryFilter::create([
            'parametr'=>'Бренд',
            'sub_category_id'=>$sub_category->id,
            'type'=>'checkbox',
        ]);
        $product = Product::create([
            'title'=>'Стирально-сушильная машина Jackys JW D8542B0BS',
            'image'=>'https://content2.onliner.by/catalog/device/header/a5bf6032d4b4d1fe8b8121407b511c33.jpg',
            'sub_category_id' => $sub_category->id,
        ]);
        Haracteristic::create([
            'parametr'=>'Бренд',
            'value'=>'Jackys',
            'product_id'=>$product->id
        ]);
        Haracteristic::create([
            'parametr'=>'Стоимость',
            'value'=>'1529,00',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Тип',
            'value'=>'Стирально-сушильная машина',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Загрузка белья',
            'value'=>'8',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Максимальная скорость отжима',
            'value'=>'1400',
            'product_id'=>$product->id
        ]);


        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина LG F2J6NNFW',
            'image'=>'https://content2.onliner.by/catalog/device/header/a3dfe83ccc229afd96e4c349169ca285.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Бренд',
            'value'=>'LG',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Стоимость',
            'value'=>'1350',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Тип',
            'value'=>'Стиральная машинка',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Загрузка белья',
            'value'=>'6',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Максимальная скорость отжима',
            'value'=>'1200',
            'product_id'=>$product->id
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина ATLANT СМА 40М109-00',
            'image'=>'https://content2.onliner.by/catalog/device/header/797cec79900b85e2727864490e27007b.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стирально-сушильная машина LG F2V9GC9W',
            'image'=>'https://content2.onliner.by/catalog/device/header/a80f18d662a39e8f749e4aac18c830e0.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина BEKO RSPE78612W',
            'image'=>'https://content2.onliner.by/catalog/device/header/9d37e7ae4aee32cabdfe1d83687e36f1.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина Samsung WW70A6S23AE/LP',
            'image'=>'https://content2.onliner.by/catalog/device/header/229be448458c7402bff6a9db1911be74.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Сушки',
            'image'=>'https://i.unishop.by/models/sushilki_dlya_ovoschey_i_fruktov/takara/df-07-1.webp',
            'category_id' => $category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Сушильная машина BEKO DF7412GA',
            'image'=>'https://content2.onliner.by/catalog/device/header/062a05590f9efb6acabce54ac60d0c07.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Сушильная машина LG DC90V5V0W',
            'image'=>'https://content2.onliner.by/catalog/device/header/bd1b2ab23a178468aba63464dedb408c.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Сушильная машина BEKO DF7439SXUV',
            'image'=>'https://content2.onliner.by/catalog/device/header/fa69310bcabf0a0a957d14bc9f0d4b71.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Сушильная машина Samsung DV90T5240AT/LP',
            'image'=>'https://content2.onliner.by/catalog/device/header/4bea3b1b404e849c2ba4f3c8d7215361.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Варочные поверхности',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Варочная панель ZorG BLC FDW rustical + black',
            'image'=>'https://content2.onliner.by/catalog/device/header/806d6f27bceec085a6657c303ae34b0f.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Варочная панель Bosch PIE631FB1E',
            'image'=>'https://content2.onliner.by/catalog/device/header/1f5683d5d369a7c52f77e06dba05493c.jpg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Варочная панель Bosch PUE611FB1E',
            'image'=>'https://content2.onliner.by/catalog/device/header/3df8d23e7ff1b3b215531a12677b3404.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Варочная панель GEFEST 2232-01',
            'image'=>'https://content2.onliner.by/catalog/device/header/196b6931fc4028f1efe134e79fd200e8.jpeg',
            'sub_category_id' => $sub_category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Духовые шкафы',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Микроволновые печи',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Холодильники',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Морозильники',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Вытяжки',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Посудомоечные машины',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::create([
            'title'=>'Телефония',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/phone.svg',
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Мобильные телефоны',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::create([
            'title'=>'Домашние телефоны',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::create([
            'title'=>'Компьютеры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/comp.svg',
        ]);
        $category = Category::create([
            'title'=>'Электроника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/ele.svg',
        ]);
        $category = Category::create([
            'title'=>'Автомобильная техника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/av.svg',
        ]);
        $category = Category::create([
            'title'=>'Принтеры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/print.svg',
        ]);
        $category = Category::create([
            'title'=>'Аксессуары',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/acc.svg',
        ]);
        $category = Category::create([
            'title'=>'Расходные материалы',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/rash.svg',
        ]);
        $category = Category::create([
            'title'=>'Телевизоры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/telv.svg',
        ]);
        $category = Category::create([
            'title'=>'Прочее',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/bt.svg',
        ]);

    }
}
