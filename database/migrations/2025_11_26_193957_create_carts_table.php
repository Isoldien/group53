<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('date_created')->useCurrent();
            $table->decimal('total_amount', 10, 2)->default(0.00);
            
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};