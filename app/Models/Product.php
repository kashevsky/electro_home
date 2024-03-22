<?php

namespace App\Models;

use App\Models\Slide;
use App\Models\ProductCharacteristic;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = [
        'published',
        'title',
        'position',
        'image',
        'price',
        'code',
        'article',
        'brand',
        'garanty',
        'is_exists',
        'category_id'
    ];

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class);
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }
}
