<?php

namespace Database\Seeders;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Haracteristic;
use Illuminate\Database\Seeder;
use App\Models\SubCategoryFilter;
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
        $category = Category::firstOrCreate([
            'title'=>'Бытовая техника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/bt.svg',
        ]);

        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Стиральные машины',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        SubCategoryFilter::firstOrCreate([
            'parametr'=>'Бренд',
            'name'=>'brand',
            'sub_category_id'=>$sub_category->id,
            'type'=>'checkbox',
            'items'=> json_encode(['Lg','ATLANT','Haier','BEKO','Samsung','Bosch','Electrolux','Candy','Indesit','Weissgauff'])
        ]);
        SubCategoryFilter::firstOrCreate([
            'name' => 'price',
            'parametr'=>'Стоимость',
            'sub_category_id'=>$sub_category->id,
            'type'=>'input',
        ]);
        SubCategoryFilter::firstOrCreate([
            'parametr'=>'Тип',
            'sub_category_id'=>$sub_category->id,
            'type'=>'checkbox',
            'name'=>'type',
            'items'=> json_encode(['стиральная машинка','cтиральная машинка с вертикальной загрузкой','стирально-сушильная машина','сушильная машина','сушильный шкаф'])
        ]);
        SubCategoryFilter::firstOrCreate([
            'name' => 'loading_laundry',
            'parametr'=>'Загрузка белья',
            'sub_category_id'=>$sub_category->id,
            'is_ranged' => 1,
            'type'=>'checkbox',
            'items'=> json_encode(['2 кг (малая)', '5 кг (уменьшенная)', '6 кг (средняя)', '9 кг (большая)'])
        ]);
        SubCategoryFilter::firstOrCreate([
            'name' => 'maximum_spin_speed',
            'parametr'=>'Максимальная скорость отжима',
            'sub_category_id'=>$sub_category->id,
            'type'=>'checkbox',
        ]);
        SubCategoryFilter::firstOrCreate([
            'parametr'=>'Сортировка',
            'name'=>'order',
            'sub_category_id'=>$sub_category->id,
            'type'=>'checkbox',
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стирально-сушильная машина Jackys JW D8542B0BS',
            'image'=>'https://content2.onliner.by/catalog/device/header/a5bf6032d4b4d1fe8b8121407b511c33.jpg',
            'sub_category_id' => $sub_category->id,
            'description'=>'Отдельностоящая, стирально-сушильная машина, сушка: естественная конденсация, с паром, загрузка до 8 кг, отжим 1400 об/мин, глубина 43 см (с люком 52 см), Aquastop',
            'price'=> 1529,
            'is_sale'=>1
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Бренд',
            'value'=>'Jackys',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
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
        Haracteristic::firstOrCreate([
            'parametr'=>'Метод сушки',
            'value'=>'естественная конденсация',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Цвет люка ',
            'value'=>'хром, серебристый',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Класс стирки',
            'value'=>'A',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Класс отжима ',
            'value'=>'B',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Класс сушки ',
            'value'=>'A',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Объём барабана',
            'value'=>'54 л',
            'product_id'=>$product->id
        ]);
        Slide::firstOrCreate([
            'src'=>'https://content2.onliner.by/catalog/device/main@2/91676d3cc7158ecc1d2088dc070c3b6c.jpg',
            'product_id'=>$product->id
        ]);
        Slide::firstOrCreate([
            'src'=>'https://content2.onliner.by/catalog/device/main@2/a6a79802474201e20f488bfe1c5f38ed.jpg',
            'product_id'=>$product->id
        ]);
        Slide::firstOrCreate([
            'src'=>'https://content2.onliner.by/catalog/device/main@2/c24f1e692f5b6f3b4ffacd708739a21d.jpg',
            'product_id'=>$product->id
        ]);
        Slide::firstOrCreate([
            'src'=>'https://content2.onliner.by/catalog/device/main@2/41a3800bc45e62ecd7c201b6e127055d.jpg',
            'product_id'=>$product->id
        ]);


        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина LG F2J6NNFW',
            'image'=>'https://content2.onliner.by/catalog/device/header/a3dfe83ccc229afd96e4c349169ca285.jpeg',
            'sub_category_id' => $sub_category->id,
            'description'=>'Отдельностоящая, стиральная машинка, с паром, загрузка до 7 кг, отжим 1200 об/мин, глубина 45 см (с люком 49.5 см), энергопотребление A+++, прямой привод, 14 программ',
            'price'=> 1350,
            'is_sale'=> 1
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
            'description'=>'Отдельностоящая, стиральная машинка, загрузка до 4 кг, отжим 1000 об/мин, глубина 33.7 см (с люком 41.5 см), энергопотребление A+, 10 программ',
            'price'=> 1820,
            'is_sale'=>1
        ]);
        Haracteristic::firstOrCreate([
            'parametr'=>'Бренд',
            'value'=>'ATLANT',
            'product_id'=>$product->id
        ]);
        Haracteristic::firstOrCreate([
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
            'title'=>'Стирально-сушильная машина LG F2V9GC9W',
            'image'=>'https://content2.onliner.by/catalog/device/header/a80f18d662a39e8f749e4aac18c830e0.jpeg',
            'sub_category_id' => $sub_category->id,
            'description'=>'Отдельностоящая, стирально-сушильная машина, сушка: естественная конденсация, с паром, загрузка до 8.5 кг, отжим 1200 об/мин, глубина 47.5 см (с люком 53.5 см), энергопотребление A, прямой привод, 14 программ, AI DD (LG)',
            'price'=> 1290,
            'is_sale'=>1
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина BEKO RSPE78612W',
            'image'=>'https://content2.onliner.by/catalog/device/header/9d37e7ae4aee32cabdfe1d83687e36f1.jpeg',
            'sub_category_id' => $sub_category->id,
            'description'=>'Отдельностоящая, стиральная машинка, с паром, загрузка до 7 кг, отжим 1200 об/мин, глубина 45 см, энергопотребление A++, 15 программ',
            'price'=> 1840,
            'is_sale'=>1
        ]);
        $product = Product::firstOrCreate([
            'title'=>'Стиральная машина Samsung WW70A6S23AE/LP',
            'image'=>'https://content2.onliner.by/catalog/device/header/229be448458c7402bff6a9db1911be74.jpeg',
            'sub_category_id' => $sub_category->id,
            'description'=>'Отдельностоящая, стиральная машинка, с паром, загрузка до 7 кг, отжим 1200 об/мин, глубина 45 см (с люком 52.5 см), энергопотребление A+++, 21 программа, AI Control (Samsung)',
            'price'=> 2100,
            'is_sale'=>1
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
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Морозильники',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Вытяжки',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Посудомоечные машины',
            'image'=>'https://tehnoslon.com/upload/iblock/558/jkzhapqb04odpy7bboegbto5l9gis93d.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Телефония',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/phone.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Мобильные телефоны',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Домашние телефоны',
            'image'=>'https://www.klentrade.ru/gpic/77/0077358/1.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Компьютеры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/comp.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Стационарные',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Ноутбуки',
            'image'=>'https://avatars.mds.yandex.net/i?id=67c845370df971f3f18a2ba2c7f03b15-2466270-images-thumbs&n=13',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Электроника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/ele.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест2',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест3',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест4',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Автомобильная техника',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/av.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест2',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест3',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест4',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест5',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Принтеры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/print.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест2',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест3',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест4',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест5',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Аксессуары',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/acc.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест2',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест3',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест4',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Расходные материалы',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/rash.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Телевизоры',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/telv.svg',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);
        $category = Category::firstOrCreate([
            'title'=>'Прочее',
            'image'=>'https://kupika.by/storage/2023-03/5dca32ae-749d-4663-aa09-e80c7dc77056/IEe4oVlwiImvapGoaFSMmxYMv2ojGO3YHMhdWXfR.webp',
            'logo'=>'img/all.png',
        ]);
        $sub_category = SubCategory::firstOrCreate([
            'title'=>'Тест1',
            'image'=>'https://sgfm.elcorteingles.es/SGFM/dctm/IMAGENES02/201204/20/00197915206250___P1_1000x1000.jpg',
            'category_id' => $category->id,
        ]);

    }
}
