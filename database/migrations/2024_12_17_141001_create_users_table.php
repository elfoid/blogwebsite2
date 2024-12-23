<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) {
            $table->uuid('user_id');
            $table->index('user_id');
            $table->string('profile_pic')->nullable();
            $table->string('name');
            $table->string('password');
            // Add a new flag for if user can comment
            $table->boolean('can_comment')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};