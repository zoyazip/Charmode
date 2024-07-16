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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->unsignedBigInteger('colorID');
            $table->unsignedBigInteger('orderID');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('productID')->references('id')->on('products');
            $table->foreign('colorID')->references('id')->on('colors');
            $table->foreign('orderID')->references('id')->on('orders');

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};