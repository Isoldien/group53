<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('admin_messages', function (Blueprint $table) {
            $table->id("message_id")->autoIncrement()->type("bigInteger");
            $table->string("message")->nullable();
            $table->timestamps();
            $table->string("title")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
