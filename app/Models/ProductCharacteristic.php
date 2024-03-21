<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    use HasFactory;

    protected $table = 'products_characteristics';

    protected $fillable = [
        'product_id',
        'characteristic_id',
        'value'
    ];
}
