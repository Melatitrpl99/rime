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

    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('activities', App\Http\Controllers\ActivityController::class)
        ->names('activities');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('reports', App\Http\Controllers\ReportController::class)
        ->names('reports');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('statuses', App\Http\Controllers\StatusController::class)
        ->names('statuses');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('partners', App\Http\Controllers\PartnerController::class)
        ->names('partners');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('spendings', App\Http\Controllers\SpendingController::class)
        ->names('spendings');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('spending_details', App\Http\Controllers\SpendingDetailController::class)
        ->names('spendingDetails');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('products', App\Http\Controllers\ProductController::class)
        ->names('products');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('product_stocks', App\Http\Controllers\ProductStockController::class)
        ->names('productStocks');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('carts', App\Http\Controllers\CartController::class)
        ->names('carts');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('cart_details', App\Http\Controllers\CartDetailController::class)
        ->names('cartDetails');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('orders', App\Http\Controllers\OrderController::class)
        ->names('orders');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('order_details', App\Http\Controllers\OrderDetailController::class)
        ->names('orderDetails');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('transactions', App\Http\Controllers\TransactionController::class)
        ->names('transactions');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('transaction_details', App\Http\Controllers\TransactionDetailController::class)
        ->names('transactionDetails');
});




Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('discounts', App\Http\Controllers\DiscountController::class)
        ->names('discounts');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('discount_details', App\Http\Controllers\DiscountDetailController::class)
        ->names('discountDetails');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('events', App\Http\Controllers\EventController::class)
        ->names('events');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('files', App\Http\Controllers\FileController::class)
        ->names('files');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('file_thumbs', App\Http\Controllers\FileThumbController::class)
        ->names('fileThumbs');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('post_categories', App\Http\Controllers\PostCategoryController::class)
        ->names('postCategories');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('posts', App\Http\Controllers\PostController::class)
        ->names('posts');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('shipments', App\Http\Controllers\ShipmentController::class)
        ->names('shipments');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', App\Http\Controllers\CategoryController::class)
        ->names('categories');
});
