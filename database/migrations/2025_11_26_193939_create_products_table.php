<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name', 150);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity');
            $table->string('image_url', 255)->nullable();
            $table->string('brand', 100)->nullable();
            $table->string('pet_type', 60)->nullable();
            $table->dateTime('date_added')->useCurrent();
            $table->tinyInteger('is_active')->default(1);
            
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('restrict');
            $table->index('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};