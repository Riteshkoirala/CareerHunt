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
        //this is the database structure of the comment as seen here this is
        //use to create the database
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
