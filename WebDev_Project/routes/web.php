<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/adminPage', function () {
    return view('adminPage');
})->name('adminPage');
/* Route::get('/CRUDproduct', function () {
    return view('CRUDproduct');
})->name('CRUDproduct'); */
Route::get('/CRUDuser', function () {
    return view('CRUDuser');
})->name('CRUDuser');


Route::get('/CRUDproductIndex', [ProductController::class, 'index']);
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/home', [ProductController::class, 'indexOrder'])->name('home');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
Route::post('/ordersAll', [OrderController::class, 'storeAll'])->name('order.storeAll');
Route::get('/cart', [OrderController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/{id}', [OrderController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [OrderController::class, 'destroy'])->name('cart.delete');




