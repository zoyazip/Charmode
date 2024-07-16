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
            $table->string('product_code');
            $table->string('name');
            $table->longText('description');
            $table->unsignedBigInteger('subcategory_id');
            $table->double('oldPrice');
            $table->double('newPrice');
            $table->integer('discount');
            $table->integer('stockQuantity');
            $table->integer('shippingCost');
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('sub_categories');

            $table->softDeletes('deleted_at', precision: 0);
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
