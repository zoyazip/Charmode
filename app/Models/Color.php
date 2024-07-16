<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex',
    ];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'color_id'); // 'colorID' should match the foreign key in product_colors table
    }
}
