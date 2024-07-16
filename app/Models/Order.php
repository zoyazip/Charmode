<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'totalCost',
        'deliveryCost',
        'fullName',
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
}
