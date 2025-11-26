<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('restrict');
            $table->foreignId('order_id')->nullable()->constrained('orders', 'order_id')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('restrict');
            $table->integer('quantity_change');
            $table->enum('type', ['in', 'out', 'adjustment']);
            $table->text('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index('product_id');
            $table->index('order_id');
            $table->index('type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_transactions');
    }
};
