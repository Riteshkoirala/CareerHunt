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
        //this is the database structure of the assessment as seen here this is
        //use to create the database
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->string('tag');
            $table->longText('coding')->nullable();
            $table->longText('choose');
            $table->string('answer');
            $table->string('label');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
