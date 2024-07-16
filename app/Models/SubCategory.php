<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;


class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
