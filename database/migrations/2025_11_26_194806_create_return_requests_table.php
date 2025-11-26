<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('return_requests', function (Blueprint $table) {
            $table->id('return_id');
            $table->foreignId('order_item_id')->constrained('order_items', 'order_item_id')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('restrict');
            $table->text('reason');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->timestamp('request_date')->useCurrent();
            $table->timestamp('resolution_date')->nullable();
            $table->decimal('refund_amount', 10, 2)->nullable();
            $table->text('admin_notes')->nullable();
            
            $table->index('order_item_id');
            $table->index('user_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('return_requests');
    }
};