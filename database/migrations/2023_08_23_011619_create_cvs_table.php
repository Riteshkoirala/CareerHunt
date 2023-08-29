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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('language')->nullable();
            $table->longText('objective')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('education')->nullable();
            $table->longText('projects')->nullable();
            $table->longText('certification_training')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
