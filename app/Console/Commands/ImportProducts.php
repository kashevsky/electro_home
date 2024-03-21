<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Product;
use App\Models\ProductCharacteristic;
use App\Models\Slide;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from CRM';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiClient = new ApiClient(env('API_LOGIN'), env('API_PASSWORD'));

        $skip = 0;

        $take = 20;

        $brands = [];

        while ($apiClient->getProducts("\$skip={$skip}&\$top={$take}")) {
            $products = $apiClient->getProducts("\$skip={$skip}&\$top={$take}");

            if (!empty($products)) {

                foreach ($products as $product) {

                    $brand = $product['Brand'];

                    if (!empty($brand['Title'])) {
                        $brands[$brand['$id']] = $brand['Title'];
                        $brand = $brand['Title'];
                    } elseif (!empty($brand['$ref'])) {
                        $brand = $brands[$brand['$ref']];
                    }

                    $keyParams = [
                        'code' => $product['Code'],
                        'article' => $product['Article'],
                        'brand' => $brand
                    ];

                    $params = [
                        'title' => $product['Title'],
                        'price' => $product['Price'],
                        'is_exists' => $product['IsExists'],
                        'garanty' => $product['Garanty']
                    ];


                    $category = $apiClient->getProductCategory($product['Categories'][0]['CatId']);

                    $category = Category::where('title', $category['Caption'])->first();

                    if (is_object($category)) {
                        $params['category_id'] = $category->id;
                    }

                    $productValues = $apiClient->getProductValues($product['Id']);

                    $photoList = $product['PhotoList'];

                    $product = Product::updateOrCreate($keyParams, $params);

                    if (!empty($photoList)) {
                        $photos = explode('|', $photoList);

                        foreach ($photos as $photo) {
                            $photo = env('IMAGES_FOLDER_URL') . $photo;

                            Slide::firstOrCreate([
                                'product_id' => $product->id,
                                'src' => $photo
                            ]);
                        }
                    }

                    if (!empty($productValues)) {

                        foreach ($productValues as $productValue) {

                            $paramItemValue = $apiClient->getParamItemValue($productValue['val_id']);

                            if (!empty($paramItemValue)) {

                                $itemObj = $paramItemValue['item_id_obj'];

                                $characteristic = Characteristic::getByTitle($itemObj['title_v1']);

                                if (is_object($characteristic)) {
                                    ProductCharacteristic::firstOrCreate([
                                        'product_id' => $product->id,
                                        'characteristic_id' => $characteristic->id,
                                        'value' => $paramItemValue['val_string']
                                    ]);
                                }
                            }
                        }
                    }
                }

                $skip += 20;

                $this->info("Загружено {$skip} продуктов");
            }
        }
    }
}
