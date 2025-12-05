<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Change the id column to user_id
            $table->renameColumn('id', 'user_id');
            
            // Modify existing columns
            $table->string('name', 120)->change();
            $table->string('email', 120)->change();
            $table->string('password', 255)->change();
            
            // Add new columns
            $table->string('phone', 30)->nullable()->after('password');
            $table->enum('role', ['customer', 'admin'])->default('customer')->after('phone');
            
            // Add indexes
            $table->index('email');
            $table->index('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse the changes
            $table->renameColumn('user_id', 'id');
            $table->dropColumn(['phone', 'role']);
            $table->dropIndex(['users_email_index']);
            $table->dropIndex(['users_role_index']);
        });
    }
};
