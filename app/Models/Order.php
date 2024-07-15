<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'guestID',
        'deliveryCost',
        'bussinessPaper',
        'comment',
        'deliveryMethod',
        'deliveryPlace',
        'paymentMethod',
        'status',
        'totalSum',
    ];
}
