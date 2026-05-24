<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'sub_category',
        'min_quantity',
        'max_quantity',
        'weight',
        'weight_unit',
        'height',
        'height_unit',
        'length',
        'length_unit',
        'width',
        'width_unit',
        'status',
    ];
}
