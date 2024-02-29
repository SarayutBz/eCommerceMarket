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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('reviewID');
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->integer('rating');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
