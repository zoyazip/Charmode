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
            $table->unsignedBigInteger('user_id');
            $table->double('totalCost');
            $table->double('deliveryCost');
            $table->string('fullName');
            $table->string('city');
            $table->string('address');
            $table->string('comment')->nullable();
            $table->string('deliveryMethod');
            $table->string('deliveryPlace');
            $table->string('paymentMethod');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

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
