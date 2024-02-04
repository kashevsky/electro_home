<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasMedias;
use App\Models\SubCategory;
use A17\Twill\Models\Model;

class Product extends Model
{
    use HasBlocks, HasMedias, HasFiles;

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
