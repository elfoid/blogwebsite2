<?php

use illuminate\Database\Schema\Blueprint;
use illuminate\Database\Migrations\Migration;
use illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("comments", function (Blueprint $table) {
            $table->uuid('comment_id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('my_users')->onDelete('cascade') ;
            $table->uuid('post_id');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade') ;
            $table->text('content');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};