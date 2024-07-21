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
            $table->unsignedBigInteger('user_id')->nullable($value = true);
            $table->double('totalCost');
            $table->double('deliveryCost');
            $table->string('email');
            $table->string('city');
            $table->string('address');
            $table->string('comment')->nullable();
            $table->string('deliveryMethod');
            $table->string('deliveryPlace');
            $table->string('paymentMethod');
            $table->string('status');
            $table->boolean('paymentSuccess')->default(false);
            $table->unsignedBigInteger('trackingNumber');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes('deleted_at', precision: 0);
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
