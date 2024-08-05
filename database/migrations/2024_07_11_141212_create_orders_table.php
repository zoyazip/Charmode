<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email');
            $table->string('fullname');

            $table->decimal('totalCost', 10, 2);
            $table->decimal('deliveryCost', 10, 2);

            $table->string('city');
            $table->string('country', 50);
            $table->string('address');
            $table->string('addressOptional', 255)->nullable();

            $table->string('phoneFull', 20);
            $table->string('countryCode', 3);

            $table->string('comment')->nullable();
            $table->string('zip', 255);

            $table->string('payment', 50);
            $table->string('status');
            $table->boolean('paymentSuccess')->default(false);

            $table->string('trackingNumber')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
