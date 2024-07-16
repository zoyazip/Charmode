<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'product_id',
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
