<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicGroup extends Model
{
    use HasFactory;

    protected $table = 'characteristics_groups';

    protected $fillable = [
        'title',
        'code',
        'is_active'
    ];
}
