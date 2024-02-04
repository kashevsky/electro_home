<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Product;

class ProductRepository extends ModuleRepository
{
    use HandleBlocks, HandleMedias, HandleFiles;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
