<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\Misc\ExcelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Misc\CekDiskonController;
use App\Http\Controllers\Misc\FilepondController;
use App\Http\Controllers\Misc\GetUserRelationController;
use App\Http\Controllers\Misc\RegionController;
use App\Http\Controllers\Misc\StokProdukController;
use App\Http\Controllers\OrderTransactionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserShipmentController;
use App\Http\Controllers\UserVerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Auth::routes();

Route::get('/laporan', function () {
    return view('laporan.index');
});

Route::get('/pengeluaran', function () {
    return view('laporan.pengeluaran');
});

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
    Route::get('get_order', [GetUserRelationController::class, 'getOrders'])->name('get_orders');
    Route::get('get_cart_details', [GetUserRelationController::class, 'getCartDetails'])->name('get_cart_details');
    Route::get('get_shipping_addresses', [GetUserRelationController::class, 'getShippingAddresses'])->name('get_shipping_addresses');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('activities', ActivityController::class)
            ->missing(function () {
                flash('Activity not found', 'danger');
                return redirect()->route('admin.activities.index');
            });

        Route::resource('carts', CartController::class)
            ->missing(function () {
                flash('Cart not found', 'danger');
                return redirect()->route('admin.carts.index');
            });

        Route::resource('colors', ColorController::class)
            ->missing(function () {
                flash('Color not found', 'danger');
                return redirect()->route('admin.colors.index');
            });

        Route::resource('discounts', DiscountController::class)
            ->missing(function () {
                flash('Discount not found', 'danger');
                return redirect()->route('admin.discounts.index');
            });

        Route::resource('files', FileController::class)
            ->missing(function () {
                flash('File not found', 'danger');
                return redirect()->route('admin.files.index');
            });

        Route::resource('orders', OrderController::class)
            ->missing(function () {
                flash('Order not found', 'danger');
                return redirect()->route('admin.orders.index');
            });

        Route::resource('partners', PartnerController::class)
            ->missing(function () {
                flash('Partner not found', 'danger');
                return redirect()->route('admin.partners.index');
            });

        Route::resource('posts', PostController::class)
            ->missing(function () {
                flash('Post not found', 'danger');
                return redirect()->route('admin.posts.index');
            });

        Route::resource('post_categories', PostCategoryController::class)
            ->missing(function () {
                flash('Post categories not found', 'danger');
                return redirect()->route('admin.post_categories.index');
            });

        Route::resource('products', ProductController::class)
            ->missing(function () {
                flash('Product not found', 'danger');
                return redirect()->route('admin.products.index');
            });

        Route::resource('product_categories', ProductCategoryController::class)
            ->missing(function () {
                flash('Product Category not found', 'danger');
                return redirect()->route('admin.product_categories.index');
            });

        Route::resource('product_stocks', ProductStockController::class)
            ->missing(function () {
                flash('Product stocks not found', 'danger');
                return redirect()->route('admin.product_stocks.index');
            });

        Route::resource('reports', ReportController::class)
            ->missing(function () {
                flash('Report not found', 'danger');
                return redirect()->route('admin.reports.index');
            });

        Route::resource('user_shipments', UserShipmentController::class)
            ->missing(function () {
                flash('User Shipment not found', 'danger');
                return redirect()->route('admin.shipments.index');
            });

        Route::resource('sizes', SizeController::class)
            ->missing(function () {
                flash('Size not found', 'danger');
                return redirect()->route('admin.sizes.index');
            });

        Route::resource('spendings', SpendingController::class)
            ->missing(function () {
                flash('Spending not found', 'danger');
                return redirect()->route('admin.spendings.index');
            });

        Route::resource('statuses', StatusController::class)
            ->missing(function () {
                flash('Status not found', 'danger');
                return redirect()->route('admin.statuses.index');
            });

        Route::resource('order_transactions', OrderTransactionController::class)
            ->missing(function () {
                flash('Transaction not found', 'danger');
                return redirect()->route('admin.transactions.index');
            });

        Route::resource('users', UserController::class)
            ->missing(function () {
                flash('User not found', 'danger');
                return redirect()->route('admin.users.index');
            });

        Route::resource('testimonies', TestimonyController::class)
            ->missing(function () {
                flash('Testimony not found', 'danger');
                return redirect()->route('admin.testimonies.index');
            });

        Route::resource('laba_rugi', LabaRugiController::class)
            ->parameters(['laba_rugi' => 'laba_rugis'])
            ->names('laba_rugi');

        Route::resource('user_verifications', UserVerificationController::class)
            ->missing(function () {
                flash('User Verification not found', 'danger');
                return redirect()->route('admin.user_verifications.index');
            });
    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('spending_categories', App\Http\Controllers\SpendingCategoryController::class)
        ->missing(function () {
            flash('Spending Category not found', 'danger');

            return redirect()->route('admin.spending_categories.index');
        });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('spending_units', App\Http\Controllers\SpendingUnitController::class)
        ->missing(function () {
            flash('Spending Unit not found', 'danger');

            return redirect()->route('admin.spending_units.index');
        });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('payment_methods', App\Http\Controllers\PaymentMethodController::class)
        ->missing(function () {
            flash('Payment Method not found', 'danger');

            return redirect()->route('admin.payment_methods.index');
        });
});
