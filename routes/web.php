<?php

use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {

    $products = Product::all();
    return view('homepage',compact('products'));
})->name('home');

// หน้า แรก เว็บ welcome


// หน้า register
Route::get('/register', [UserAuth::class, 'showRegister'])->name('register.r');
Route::post('/register', [UserAuth::class, 'register'])->name('register');;

// หน้า login
Route::get('/login', [UserAuth::class, 'showLogin'])->name('login.l');
Route::post('/login', [UserAuth::class, 'login'])->name('login');

// logout
Route::post('/logout', [UserAuth::class, 'logout'])->name('logout');

//profile
Route::get('/profile', [UserAuth::class, 'profile'])->name('profile');

Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

