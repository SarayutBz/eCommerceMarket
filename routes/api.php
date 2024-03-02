<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Models\Product;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// GET ALL Products
Route::get('/products',[ProductController::class, 'index']);

//register Admin

Route::post('/register-api-admin', [ApiController::class, 'register']);

// register
Route::post('/register-api', [UserController::class, 'register']);

// login
Route::post('/login-api', [UserController::class, 'login']);


// logout
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout-api', [UserController::class, 'logout']);
    Route::post('/update-name-api', [UserController::class, 'update']);

});

