<?php

namespace App\Models;

use App\Models\BasketProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(BasketProduct::class);
    }
}
