<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'group_id',
        'is_active',
        'type',
        'name',
        'in_filter',
        'is_expanded'
    ];
}
