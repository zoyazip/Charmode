<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreign('cart_id')->references('id')->on('cart');
            $table->foreign('product_id')->references('id')->on('product');
            $table->integer('quantity');
            $table->timestamps();
        });

        // 'cart_id',
        // 'product_id',
        // 'quantity',
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_list_items');
    }
};
