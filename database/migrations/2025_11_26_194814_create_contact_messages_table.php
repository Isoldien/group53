<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['new', 'read', 'resolved'])->default('new');
            $table->timestamp('date_sent')->useCurrent();
            
            $table->index('user_id');
            $table->index('status');
            $table->index('date_sent');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};