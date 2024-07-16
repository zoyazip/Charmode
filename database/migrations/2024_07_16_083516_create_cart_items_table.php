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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('productID');
            $table->unsignedBigInteger('colorID');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('colorID')->references('id')->on('colors');
            $table->foreign('productID')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
