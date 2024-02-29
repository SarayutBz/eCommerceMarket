<?php

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;

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

Route::get('/home', function (Request $request) {

// $products = Product::all();
$search = $request->search;
if ($search != '') {
    $products = Product::where('name', 'like', '%' . $search . '%')->orWhere('price', 'like', $search)->get();
} else {
    $products = Product::all();
}

$images = []; // Initialize the $images array

if (Auth::check()) {
    // User is logged in
    $userId = Auth()->user()->getAttributes()['userID'];
    $images = Image::where('userID', $userId)->get();
    // return response()->json(['data'=>$images]);
    return view('homepage', compact('products', 'images'));
}
return view('homepage', compact('products', 'images'));


    // dd($images);
    // return response()->json(['data'=>$images]);
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



Route::get('/', [ImageController::class, 'index']);
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');



Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::delete('/delete',[CartController::class,'delete'])->name('delete-cart');

Route::post('/updatename', [UserAuth::class, 'update'])->name('update');
Route::delete('/deleteAccount', [UserAuth::class, 'deleteAccount'])->name('deleteAccount');

Route::get('/forgot-password',[UserAuth::class, 'forgotpassword'])->name('forgotpassword');

Route::post('/send',[MailController::class,'index'])->name('send');
Route::post('/sendagian',[MailController::class,'sendagian'])->name('sendagian');

Route::get('/code',[MailController::class,'showReset'])->name('code');


Route::post('/reset',[MailController::class,'reset'])->name('reset');

Route::get('/reset-password',[MailController::class,'ResetPageview'])->name('resetpage');

Route::post('/UpdatePassword',[MailController::class,'UpdatePassword'])->name('UpdatePassword');
