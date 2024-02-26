<?php

use App\Models\Image;
use App\Models\Product;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
// use Illuminate\Support\Facades\Route;



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
    if($search != ''){
        $products = Product::where('name','like','%'.$search.'%')->Orwhere('price','like',$search)->get();
    }else{
        $products = Product::all();
    }


    if (\Illuminate\Support\Facades\Auth::check()) {
    $userId = Auth()->user()->getAttributes()['userID'];
    $images = Image::where('userID', $userId)->get();
    }
    else{
        return view('homepage',compact('products'));
    }
    return view('homepage',compact('products','images'));
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

Route::post('/updatename', [UserAuth::class, 'updatename'])->name('updatename');


Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
