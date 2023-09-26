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
        //this is the database structure of the contact as seen here this is
        //use to create the database
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_fullname');
            $table->string('contact_email');
            $table->string('contact_numbers')->nullable();
            $table->longText('contact_message');
            $table->boolean('is_read')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
