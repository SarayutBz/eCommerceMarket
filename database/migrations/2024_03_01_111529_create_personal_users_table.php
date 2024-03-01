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
        Schema::create('personal_users', function (Blueprint $table) {
            $table->id('personalID');
            $table->unsignedBigInteger('userID')->nullable();
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->string('fname');
            $table->string('lname');
            $table->string('adress');
            $table->string('phonenumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_users');
    }
};
