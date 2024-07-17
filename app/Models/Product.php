<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductColor;
use App\Models\CartItem;
use App\Models\Image;
use App\Models\Review;
use App\Models\Specification;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SubCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'name',
        'description',
        'subcategory_id',
        'oldPrice',
        'newPrice',
        'discount',
        'stockQuantity',
        'shippingCost',
    ];

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function specifications(): HasMany
    {
        return $this->hasMany(Specification::class, 'product_id');
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
