<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DiscountDetailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileThumbController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\BukuBesarController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\Misc\ExcelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\SpendingDetailController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/laporan', function () {
    return view('laporan.index');
});

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

Route::view('upload', 'upload')->name('upload');
Route::post('import', [ExcelController::class, 'import'])->name('import');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('labarugi', LabaRugiController::class)->names('laba_rugi');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('reports', ReportController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('spendings', SpendingController::class);
        Route::resource('spending_details', SpendingDetailController::class);
        Route::resource('products', ProductController::class);
        Route::resource('product_stocks', ProductStockController::class);
        Route::resource('carts', CartController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('discounts', DiscountController::class);
        Route::resource('events', EventController::class);
        Route::resource('files', FileController::class);
        Route::resource('post_categories', PostCategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('shipments', ShipmentController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('colors', ColorController::class);
        Route::resource('dimensions', DimensionController::class);
        Route::resource('sizes', SizeController::class);
        Route::resource('order_details', OrderDetailController::class);
        Route::resource('cart_details', CartDetailController::class);
        Route::resource('transaction_details', TransactionDetailController::class);
        Route::resource('discount_details', DiscountDetailController::class);
        Route::resource('file_thumbs', FileThumbController::class);
    });
});
