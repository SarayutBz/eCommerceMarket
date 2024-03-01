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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id('orderdetailID');
            $table->unsignedBigInteger('orderID');
            $table->foreign('orderID')->references('orderID')->on('orders');
            $table->integer('quantity');
            $table->integer('price');
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('productID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
