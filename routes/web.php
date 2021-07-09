<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\BukuBesarController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\Misc\ExcelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDimensionController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\SpendingDetailController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
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

    Route::resource('bukubesar', BukuBesarController::class)->names('buku_besar');

    Route::resource('labarugi', LabaRugiController::class)->names('laba_rugi');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('activities', ActivityController::class)
            ->names('activities');
        Route::resource('reports', ReportController::class)
            ->names('reports');
        Route::resource('statuses', StatusController::class)
            ->names('statuses');
        Route::resource('partners', PartnerController::class)
            ->names('partners');
        Route::resource('spendings', SpendingController::class)
            ->names('spendings');
        Route::resource('spending_details', SpendingDetailController::class)
            ->names('spendingDetails');
        Route::resource('products', ProductController::class)
            ->names('products');
        Route::resource('product_stocks', ProductStockController::class)
            ->names('productStocks');
        Route::resource('carts', CartController::class)
            ->names('carts');
        Route::resource('orders', OrderController::class)
            ->names('orders');
        Route::resource('transactions', TransactionController::class)
            ->names('transactions');
        Route::resource('discounts', DiscountController::class)
            ->names('discounts');
        Route::resource('events', EventController::class)
            ->names('events');
        Route::resource('files', FileController::class)
            ->names('files');
        Route::resource('post_categories', PostCategoryController::class)
            ->names('postCategories');
        Route::resource('posts', PostController::class)
            ->names('posts');
        Route::resource('shipments', ShipmentController::class)
            ->names('shipments');
        Route::resource('categories', CategoryController::class)
            ->names('categories');
        Route::resource('product_colors', ProductColorController::class)
            ->names('productColors');
        Route::resource('product_dimensions', ProductDimensionController::class)
            ->names('productDimensions');
        Route::resource('product_sizes', ProductSizeController::class)
            ->names('productSizes');
    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('order_details', App\Http\Controllers\OrderDetailController::class)
        ->names('orderDetails');
});
