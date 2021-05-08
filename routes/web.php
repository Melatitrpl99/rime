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


Route::get('/laporan', function () {
    return view('laporan.index');
});

Route::resource('/bukubesar',App\Http\Controllers\Laporan\BukuBesarController::class);

Route::resource('/labarugi',App\Http\Controllers\Laporan\LabaRugiController::class);

Route::get('/pengeluaran', function () {
    return view('laporan.pengeluaran');
});
// Route::get('/setting', function () {
//     return view('setting.index');
// });

// Route::get('/ussers', function () {
//     return view('ussers.index');
// });
// Auth::routes();



Route::get('/dashboard', function () {
	return view ('dashboard.index');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('activities', App\Http\Controllers\ActivityController::class);
        Route::resource('categories', App\Http\Controllers\CategoryController::class);
        Route::resource('products', App\Http\Controllers\ProductController::class);
        Route::resource('events', App\Http\Controllers\EventController::class);
        Route::resource('news', App\Http\Controllers\NewsController::class);
        Route::resource('partners', App\Http\Controllers\PartnerController::class);
        Route::resource('discounts', App\Http\Controllers\DiscountController::class);
        Route::resource('discount_etails', App\Http\Controllers\DiscountDetailController::class)->names('discountDetails');
        Route::resource('carts', App\Http\Controllers\CartController::class);
        Route::resource('cart_details', App\Http\Controllers\CartDetailController::class)->names('cartDetails');
        Route::resource('orders', App\Http\Controllers\OrderController::class);
        Route::resource('order_details', App\Http\Controllers\OrderDetailController::class)->names('orderDetails');
        Route::resource('reports', App\Http\Controllers\ReportController::class);
        Route::resource('transactions', App\Http\Controllers\TransactionController::class);
        Route::resource('transaction_details', App\Http\Controllers\TransactionDetailController::class)->names('transactionDetails');
        Route::resource('shipments', App\Http\Controllers\ShipmentController::class);
    });
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('spendings', App\Http\Controllers\SpendingController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('additionalCosts', App\Http\Controllers\AdditionalCostController::class, ["as" => 'admin']);
});
