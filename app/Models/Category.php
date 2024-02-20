<?php

namespace App\Models;


use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{

    protected $guarded = false;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->join('sub_categories', 'categories.id', 'sub_categories.category_id')
            ->join('products', 'sub_categories.id', 'products.sub_category_id');
    }
}
