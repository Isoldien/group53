<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('user_id');
            $table->string('address_line', 200);
            $table->string('city', 80);
            $table->string('postal_code', 20);
            $table->string('country', 80);
            $table->tinyInteger('is_default')->default(0);
            
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

