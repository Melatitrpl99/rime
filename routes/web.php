<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\Misc\ExcelController;
use App\Http\Controllers\Misc\CekDiskonController;
use App\Http\Controllers\Misc\FilepondController;
use App\Http\Controllers\Misc\GetUserRelationController;
use App\Http\Controllers\Misc\RegionController;
use App\Http\Controllers\Misc\StokProdukController;
use App\Models\VerificationStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::redirect('/', 'login');

Auth::routes(['register' => false]);

Route::post('import', [ExcelController::class, 'import'])->name('import');

Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::get('home', [HomeController::class, 'home'])->name('page.home');
    Route::get('profile', [HomeController::class, 'profile'])->name('page.profile');
    Route::get('settings', [HomeController::class, 'settings'])->name('page.settings');

    Route::group(['prefix' => 'filepond', 'as' => 'filepond.'], function () {
        Route::post('process', [FilepondController::class, 'process'])->name('process');
        Route::delete('revert', [FilepondController::class, 'revert'])->name('revert');
        Route::get('restore', [FilepondController::class, 'restore'])->name('restore');
        Route::get('load', [FilepondController::class, 'load'])->name('load');
        Route::get('fetch', [FilepondController::class, 'fetch'])->name('fetch');
    });

    Route::get('/cek', CekDiskonController::class)->name('cek_diskon');

    Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
        Route::get('get_regency', [RegionController::class, 'getRegency'])
            ->name('regency');
        Route::get('get_district', [RegionController::class, 'getDistrict'])
            ->name('district');
        Route::get('get_village', [RegionController::class, 'getVillage'])
            ->name('village');
    });

    Route::group(['prefix' => 'stok', 'as' => 'stok.'], function () {
        Route::get('product_stock', [StokProdukController::class, 'getProductStock'])->name('produk');
        Route::get('size', [StokProdukController::class, 'getSize'])->name('size');
        Route::get('color', [StokProdukController::class, 'getColor'])->name('color');
        Route::get('stok_ready', [StokProdukController::class, 'getStokReady'])->name('stok_ready');
    });

    Route::get('get_carts', [GetUserRelationController::class, 'getCarts'])->name('get_carts');
    Route::get('get_cart_details', [GetUserRelationController::class, 'getCartDetails'])->name('get_cart_details');
    Route::get('get_orders', [GetUserRelationController::class, 'getOrders'])->name('get_orders');
    Route::get('get_order_details', [GetUserRelationController::class, 'getOrderDetails'])->name('get_order_details');
    Route::get('get_shipping_addresses', [GetUserRelationController::class, 'getShippingAddresses'])->name('get_shipping_addresses');

    Route::get('admin/laba_rugi', [LabaRugiController::class, 'index'])->name('admin.laba_rugi.index');
    Route::get('admin/laba_rugi/pdf', [LabaRugiController::class, 'pdf'])->name('admin.laba_rugi.pdf');

    Route::get('admin/_misc/_create_verification_status', function () {
        Schema::disableForeignKeyConstraints();
        VerificationStatus::truncate();
        VerificationStatus::create(['name' => 'Sedang memenuhi persyaratan']);
        VerificationStatus::create(['name' => 'Melakukan verifikasi']);
        VerificationStatus::create(['name' => 'Selesai']);
        VerificationStatus::create(['name' => 'Batal']);
        Schema::enableForeignKeyConstraints();
    });

    require __DIR__ . '/web_resources.php';
});
