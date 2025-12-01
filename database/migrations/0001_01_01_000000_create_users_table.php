<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name', 120);
            $table->string('email', 120)->unique();
            $table->string('password', 255);
            $table->string('phone', 30)->nullable();
            $table->enum('role', ['customer', 'admin'])->default('customer');
            $table->timestamps();
            $table->index('email');
            $table->index('role');
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
