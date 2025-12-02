<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name', 80);
            $table->string('description', 255)->nullable();
            
            $table->index('category_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
