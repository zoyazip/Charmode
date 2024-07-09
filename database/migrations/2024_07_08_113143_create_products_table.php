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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('category_id');
            $table->integer('old_price');
            $table->integer('new_price');
            $table->integer('stock_quantity');
            $table->json('specifications');
            $table->integer('color_id');
            $table->integer('delivery_cost');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
