<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("my_users", function (Blueprint $table) {
            $table->uuid("user_id")->primary();
            $table->uuid("role_id");
            $table->string('name');
            $table->string('password');
            $table->timestamps();
            $table->string('profile_pic')
                ->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('my_users');
    }
};