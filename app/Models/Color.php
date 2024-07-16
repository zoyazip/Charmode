<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductColor;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex',
    ];

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }
}
