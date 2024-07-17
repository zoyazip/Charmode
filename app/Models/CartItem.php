<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Product;
use App\Models\Color;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'color_id',
        'quantity',
    ];


    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color(): BelongsTo{
        return $this->belongsTo(Color::class, 'color_id');
    }
}
