<?php

use illuminate\Database\Schema\Blueprint;
use illuminate\Database\Migrations\Migration;
use illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("posts", function (Blueprint $table) {
            $table->uuid('post_id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade') ;
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};