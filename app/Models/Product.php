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

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'subcategoryID',
        'oldPrice',
        'newPrice',
        'discount',
        'stockQuantity',
        'shippingCost',
    ];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
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

    public function specification(): HasMany
    {
        return $this->hasMany(Specification::class);
    }
}
