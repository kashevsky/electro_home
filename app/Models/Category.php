<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'image',
        'logo',
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
