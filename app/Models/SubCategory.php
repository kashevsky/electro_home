<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubCategoryFilter;
use App\Models\HaracteristicsTemplate;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{

    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function filters()
    {
        return $this->hasMany(SubCategoryFilter::class);
    }

    public function haracteristicsTemplate()
    {
        return $this->hasMany(HaracteristicsTemplate::class);
    }
}
