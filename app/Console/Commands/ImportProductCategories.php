<?php

namespace App\Console\Commands;

use App\Models\ApiClient;
use App\Models\Category;
use Illuminate\Console\Command;

class ImportProductCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:product-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import product categories from CRM';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiClient = new ApiClient(env('API_LOGIN'), env('API_PASSWORD'));

        // Первые 20 - системные.
        $filter = rawurlencode('Id gt 20');

        $productCategories = $apiClient->getProductCategories("/?\$filter=({$filter})");

        foreach ($productCategories as $productCategory) {
            $params = [
                'title' => $productCategory['Caption'],
                'image' => $productCategory['ImageUrl']
            ];

            $extraParams = [];

            if (!empty($productCategory['ParentId'])) {
                $parentCategory = $apiClient->getProductCategory($productCategory['ParentId']);
                $parentCategory = Category::where('title', $parentCategory['Caption'])->first();
                if (is_object($parentCategory)) {
                    $extraParams['parent_id'] = $parentCategory->id;
                }
            }

            $category = Category::updateOrCreate($params, $extraParams);

            $filter = rawurlencode("ParentId eq {$productCategory['Id']}");

            $childCategories = $apiClient->getProductCategories("/?\$filter=({$filter})");

            foreach ($childCategories as $childCategory) {
                Category::firstOrCreate([
                    'title' => $childCategory['Caption'],
                    'image' => $childCategory['ImageUrl'],
                    'parent_id' => $category->id
                ]);
            }
        }
    }
}
