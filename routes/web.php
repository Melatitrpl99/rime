<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/produk', function () {
//     return view('produk.index');
// });

// Route::get('/penjualan', function () {
//     return view('penjualan.index');
// });


// Route::get('/laporan', function () {
//     return view('laporan.index');
// });

// Route::get('/setting', function () {
//     return view('setting.index');
// });

// Route::get('/ussers', function () {
//     return view('ussers.index');
// });
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('events', App\Http\Controllers\EventsController::class);

Route::resource('activities', App\Http\Controllers\ActivityController::class);

Route::resource('news', App\Http\Controllers\NewsController::class);

Route::resource('carts', App\Http\Controllers\CartsController::class);

Route::resource('cartDetails', App\Http\Controllers\CartDetailController::class);

Route::resource('orders', App\Http\Controllers\OrderController::class);





Route::resource('orderDetails', App\Http\Controllers\OrderDetailController::class);





Route::resource('transactions', App\Http\Controllers\TransactionController::class);

Route::resource('transactionDetails', App\Http\Controllers\TransactionDetailController::class);

Route::resource('partners', App\Http\Controllers\partnerController::class);

Route::resource('reports', App\Http\Controllers\reportController::class);

Route::resource('shipments', App\Http\Controllers\ShipmentController::class);

Route::resource('discounts', App\Http\Controllers\DiscountController::class);

Route::resource('discountDetails', App\Http\Controllers\DiscountDetailController::class);