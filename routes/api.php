<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/order', [ProductController::class, 'index']);
Route::get('/order/{productID}', [ProductController::class, 'show']);

// ใช้ 'resource' และเพิ่ม route สำหรับ 'destroy'
Route::resource('/order', ProductController::class)->except(['destroy']);
Route::delete('/order/{productID}', [ProductController::class, 'destroy'])->name('order.destroy');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


