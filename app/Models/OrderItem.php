<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use App\Models\Product;
use App\Models\Color;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'quantity',
    ];

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color(): BelongsTo{
        return $this->belongsTo(Color::class, 'color_id');
    }
}
