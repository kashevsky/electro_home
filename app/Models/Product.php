<?php

namespace App\Models;

use A17\Twill\Models\Model;
use App\Models\SubCategory;
use App\Models\Haracteristic;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;

class Product extends Model
{
    use HasBlocks, HasMedias, HasFiles;

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function haracteristics()
    {
        return $this->hasMany(Haracteristic::class);
    }
}
