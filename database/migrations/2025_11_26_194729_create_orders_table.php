<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->dateTime('order_date')->useCurrent();
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'packed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->string('payment_method', 40);
            
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('restrict');
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('restrict');
            $table->index('user_id');
            $table->index('address_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
