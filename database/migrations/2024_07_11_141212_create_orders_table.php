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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID')->nullable();
            $table->unsignedBigInteger('guestID')->nullable();
            $table->integer('deliveryCost');
            $table->boolean('bussinessPaper');
            $table->string('comment')->nullable();
            $table->string('deliveryMethod');
            $table->string('deliveryPlace');
            $table->string('paymentMethod');
            $table->string('status');
            $table->json('itemID');
            $table->integer('totalSum');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('guestID')->references('id')->on('guests');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
