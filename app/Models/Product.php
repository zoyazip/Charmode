<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'old_price',
        'new_price',
        'stock_quantity',
        'specifications',
        'color_id',
        'delivery_cost'
    ];
}
