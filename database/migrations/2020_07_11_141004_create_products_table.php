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
            $table->longText('description');
            $table->unsignedBigInteger('subcategoryID');
            $table->double('oldPrice');
            $table->double('newPrice');
            $table->integer('discount');
            $table->integer('stockQuantity');
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
