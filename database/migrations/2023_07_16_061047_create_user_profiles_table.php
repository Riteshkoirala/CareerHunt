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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('location');
            $table->string('contact_number');
            $table->string('skills');
            $table->longText('education');
            $table->string('college_name');
            $table->string('image_name');
            $table->string('image_path');
            $table->string('cv_path');
            $table->longText('about');
            $table->longText('experience');
            $table->string('linkedin_link');
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
