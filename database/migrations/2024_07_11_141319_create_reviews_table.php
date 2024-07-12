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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('productID');
            $table->integer('userID');
            $table->integer('rating');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('productID')->references('id')->on('products');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
