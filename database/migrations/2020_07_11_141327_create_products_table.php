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
            $table->unsignedBigInteger('subcategoryID');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('stockQuantity');
            $table->json('specifications');
            $table->json('colorID');
            $table->json('images');
            $table->timestamps();

            $table->foreign('subcategoryID')->references('id')->on('sub_categories');
            // $table->foreign('colorID')->references('id')->on('colors');
        
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
