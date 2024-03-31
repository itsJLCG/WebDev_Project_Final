<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PostController;
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

Route::resource('users', UserController::class);

// Route for displaying the user management page
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Route for showing the create user form
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// // Route for storing the new user data with a different URL path
// Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// Route for showing the edit user form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route for updating the user data
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Route for deleting the user data
// Route for restoring the user data
Route::get('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');

Route::get('/createpromoIndex', [PostController::class, 'index'])->name('posts');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
Route::get('/home', [ProductController::class, 'indexOrder'])->name('home');


Route::get('/posts', [PostController::class, 'show'])->name('posts.show');
Route::get('/promo/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');






