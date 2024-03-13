<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use App\Models\Haracteristic;
use App\Models\Product;
use App\Models\SubCategory;
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

    const login = 'APIUS';

    const password = '8A6F945B3720FE47';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiClient = new ApiClient(self::login, self::password);

        $skip = 0;

        $brands = [];

        $products = $apiClient->getProducts('$top=4');

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

                // $category = SubCategory::firstOrCreate([

                // ]);

                // $params['category_id'] = $category->id;

                $productValues = $apiClient->getProductValues($product['Id']);

                $product = Product::updateOrCreate($keyParams, $params);

                if (!empty($productValues)) {

                    foreach ($productValues as $productValue) {

                        $paramItemValue = $apiClient->getParamItemValue($productValue['val_id']);

                        if (!empty($paramItemValue)) {

                            $itemObj = $paramItemValue['item_id_obj'];

                            Haracteristic::firstOrCreate([
                                'product_id' => $product->id,
                                'parametr' => $itemObj['title_v1'],
                                'value' => $paramItemValue['val_string']
                            ]);
                        }
                    }
                }
            }

            $skip += 20;
        }
    }
}
