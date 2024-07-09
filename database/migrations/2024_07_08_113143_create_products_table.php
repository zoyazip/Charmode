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
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('price');
            $table->integer('stock_quantity');
            $table->integer('dimention_x');
            $table->integer('dimention_y');
            $table->integer('dimention_z');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->timestamps();
        });
    }


    // '',
    // '',
    // 'color_id',

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
