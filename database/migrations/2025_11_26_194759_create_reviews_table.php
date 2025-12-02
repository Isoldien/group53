<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->dateTime('review_date')->useCurrent();
            
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->index('product_id');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
