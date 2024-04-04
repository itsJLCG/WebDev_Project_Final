<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StockChartController;

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

Route::group(['middleware' => 'auth'], function () {
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
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


Route::get('/CRUDproductIndex', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
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

Route::get('/createpromoIndex', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'show'])->name('posts.show');
Route::get('/promo/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::get('/home', [ProductController::class, 'indexOrder'])->name('home');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id_product}/restore', [ProductController::class, 'restore'])->name('products.restore');

// Example middleware
Route::group(['middleware' => 'auth'], function () {
    Route::post('/home', [OrderController::class, 'checkout'])->name('checkout');
});

Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders');
Route::get('/comment/{id_tracking}', [CommentController::class, 'index'])->name('comment.index');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/user/datatable', [UserController::class, 'getUsers'])->name('users');
Route::get('/trackings', [TrackingController::class, 'index'])->name('trackings');
Route::patch('/trackings/{id}', [TrackingController::class, 'update'])->name('update_tracking');

Route::get('/product/datatable', [ProductController::class, 'getProducts'])->name('products');
Route::get('/post/datatable', [PostController::class, 'getPost'])->name('posts');

Route::prefix('feedbacks')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/store', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
    Route::put('/{feedback}/update', [FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('/{feedback}/delete', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
    Route::get('/{id}/restore', [FeedbackController::class, 'restore'])->name('feedbacks.restore');
});

Route::get('/feedback/datatable', [FeedbackController::class, 'getFeedback'])->name('feedbacks');

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');

// Account update routes
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');

Route::get('/stocks/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');



// Route for displaying stocks
Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');

// Route for updating stock quantities
Route::put('/stocks/{id}', [StockController::class, 'update'])->name('stocks.update');

Route::get('/stocks/graph', [StockController::class, 'showGraph'])->name('stocks.graph');
Route::get('/chart', [StockChartController::class, 'showChart'])->name('chart.show');
});

Route::get('/products', [ProductController::class, 'showStocks'])->name('products.showStocks');

Route::get('/orders-per-product', [ProductController::class, 'ordersPerProduct'])->name('orders.per.product');
Route::get('/feedback-chart', [FeedbackController::class, 'showChart'])->name('feedback.chart');
Route::get('/stocks/graph', [StockController::class, 'showChart'])->name('stocks.graph');
Route::get('/orders/graph', [OrderController::class, 'showChart'])->name('orders.graph');
