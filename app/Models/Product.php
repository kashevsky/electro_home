<?php

namespace App\Models;

use App\Models\Slide;
use App\Models\SubCategory;
use App\Models\Haracteristic;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = [
        'published',
        'title',
        'position',
        'image',
        'price'
    ];
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function haracteristics()
    {
        return $this->hasMany(Haracteristic::class);
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }
}
