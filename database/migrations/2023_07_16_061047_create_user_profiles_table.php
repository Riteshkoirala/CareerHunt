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
        //this is the database structure of the user_profile as seen here this is
        //use to create the database
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('location')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('skills')->nullable();
            $table->longText('education')->nullable();
            $table->string('college_name')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            $table->string('cv_path')->nullable();
            $table->longText('about')->nullable();
            $table->longText('experience')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
