<?php

use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\Details\CartDetailAPIController;
use App\Http\Controllers\API\Misc\GetPaymentMethodAPIController;
use App\Http\Controllers\API\Misc\GetShipmentDetailsController;
use App\Http\Controllers\API\Order\UploadInvoiceAPIController;
use App\Http\Controllers\API\Product\ProductLikeController;
use App\Http\Controllers\API\ProfileAPIController;
use App\Http\Controllers\API\UserVerification\CheckIfUserIsElligibleAPIController;
use App\Http\Controllers\API\UserVerification\CreateVerificationServiceAPIController;
use App\Http\Controllers\API\UserVerification\GetVerificationStatusAPIController;
use App\Http\Controllers\API\UserVerification\UploadImageAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::post('login', [AuthAPIController::class, 'login']);
    Route::post('register', [AuthAPIController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', [AuthAPIController::class, 'logout']);

        Route::group(['as' => 'profile.'], function () {
            Route::get('me', [ProfileAPIController::class, 'me'])->name('me');
            Route::patch('profile/update', [ProfileAPIController::class, 'updateProfile'])->name('update');
            Route::patch('login/update', [ProfileAPIController::class, 'updateLogin'])->name('update.login');
        });

        Route::group(['prefix' => 'shipments', 'as' => 'shipments.'], function () {
            Route::get('provinces', [GetShipmentDetailsController::class, 'getProvinces'])
                ->name('provinces');
            Route::get('regencies', [GetShipmentDetailsController::class, 'getRegencies'])
                ->name('regencies');
            Route::get('districts', [GetShipmentDetailsController::class, 'getDistricts'])
                ->name('districts');
            Route::get('villages', [GetShipmentDetailsController::class, 'getVillages'])
                ->name('villages');
        });

        Route::post('products/{product}/likes', [ProductLikeController::class, 'store'])
            ->name('products.like');

        Route::delete('products/{product}/likes', [ProductLikeController::class, 'destroy'])
            ->name('products.dislike');

        Route::group(['prefix' => 'carts', 'as' => 'cart.details.'], function () {
            Route::post('{cart}/products', [CartDetailAPIController::class, 'addProduct'])
                ->name('add');
            Route::patch('{cart}/products', [CartDetailAPIController::class, 'updateProduct'])
                ->name('update');
            Route::delete('{cart}/products', [CartDetailAPIController::class,  'removeProduct'])
                ->name('remove');
        });

        Route::get('payment_methods', GetPaymentMethodAPIController::class)
            ->name('payment_methods');

        Route::group(['prefix' => 'verifications', 'as' => 'verifications.'], function () {
            Route::post('verify', CheckIfUserIsElligibleAPIController::class)->name('verify');
            Route::post('create', [CreateVerificationServiceAPIController::class, 'create'])->name('create');
            Route::get('status', GetVerificationStatusAPIController::class)->name('status');
            Route::post('upload', UploadImageAPIController::class)->name('upload');
        });

        Route::post('orders/{order}/upload', UploadInvoiceAPIController::class);

        require __DIR__ . '/api_resources.php';
    });
});
