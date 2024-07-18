<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'totalCost',
        'deliveryCost',
        'email',
        'city',
        'address',
        'comment',
        'deliveryMethod',
        'deliveryPlace',
        'paymentMethod',
        'status',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}
