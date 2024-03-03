<?php

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// HomePage
Route::get('/', function (Request $request) {

    // ส่วนของ การ search หาชื่อ สินค้า
    $search = $request->search;
    if ($search != '') {
        $products = Product::where('name', 'like', '%' . $search . '%')->orWhere('price', 'like', $search)->get();
    } else {
        $products = Product::all();
    }

    $images = [];

    if (Auth::check()) {

        $userId = Auth()->user()->getAttributes()['userID'];
        $images = Image::where('userID', $userId)->get();

        return view('homepage', compact('products', 'images'));
    }
    return view('homepage', compact('products', 'images'));
})->name('home');

// Sorry Page
Route::get('/sorry ', [UserAuth::class, 'sorry'])->name('sada');


//  register
Route::get('/register', [UserAuth::class, 'showRegister'])->name('register.r');
Route::post('/register', [UserAuth::class, 'register'])->name('register');
;

//  login
Route::get('/login', [UserAuth::class, 'showLogin'])->name('login.l');
Route::post('/login', [UserAuth::class, 'login'])->name('login');


// logout
Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [UserAuth::class, 'logout'])->name('logout');

// profile + upload Image + Update name + Delete Account
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
Route::post('/update-name', [ProfileController::class, 'update'])->name('update');
Route::delete('/deleteAccount', [ProfileController::class, 'deleteAccount'])->name('deleteAccount');

});



// cart + addCart + Delete Cart
Route::middleware('auth.sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
    Route::delete('/delete', [CartController::class, 'delete'])->name('delete-cart');


});

//  Forgot Password + Send Email + Input Code + Reset Password
Route::get('/forgot-password', [UserAuth::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/send', [MailController::class, 'send'])->name('send');
Route::post('/send-again', [MailController::class, 'sendagian'])->name('sendagian');
Route::get('/code', [MailController::class, 'showReset'])->name('code');
Route::post('/reset', [MailController::class, 'reset'])->name('reset');
Route::get('/reset-password', [MailController::class, 'ResetPageview'])->name('resetpage');
Route::post('/UpdatePassword', [MailController::class, 'UpdatePassword'])->name('UpdatePassword');

// Admin + CRUD Product

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/stock', [AdminController::class, 'stock'])->name('Orders');
    // Route::get('/stock', )->name('stock');

    // CRUD Product

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


});

