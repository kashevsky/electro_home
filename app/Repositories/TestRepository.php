<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Test;

class TestRepository extends ModuleRepository
{
    use HandleMedias, HandleNesting;

    public function __construct(Test $model)
    {
        $this->model = $model;
    }
}
