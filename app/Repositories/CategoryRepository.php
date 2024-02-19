<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Category;

class CategoryRepository extends ModuleRepository
{
    use HandleMedias, HandleNesting;

    protected $relatedBrowsers = ['products'];

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
