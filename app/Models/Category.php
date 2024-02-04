<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

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
