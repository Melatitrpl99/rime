<?php

use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\Details\CartDetailAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\DiscountAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ColorAPIController;
use App\Http\Controllers\API\Misc\GetPaymentMethodAPIController;
use App\Http\Controllers\API\Misc\GetShipmentDetailsController;
use App\Http\Controllers\API\Product\ProductLikeController;
use App\Http\Controllers\API\ProfileAPIController;
use App\Http\Controllers\API\SizeAPIController;
use App\Http\Controllers\API\TestimonyAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\UserShipmentAPIController;
use App\Http\Controllers\API\UserVerification\CheckIfUserIsElligibleAPIController;
use App\Http\Controllers\API\UserVerification\CreateVerificationServiceAPIController;
use App\Http\Controllers\API\UserVerification\GetVerificationResultAPIController;
use App\Http\Controllers\API\UserVerification\UploadImageAPIController;
use App\Http\Controllers\API\UserVerificationAPIController;
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
    Route::post('logout', [AuthAPIController::class, 'logout']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['as' => 'profile.'], function () {
            Route::get('me', [ProfileAPIController::class, 'me'])->name('me');
            Route::patch('profile/update', [ProfileAPIController::class, 'updateProfile'])->name('update');
            Route::patch('login/update', [AuthAPIController::class, 'updateLogin'])->name('update.login');
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
            Route::post('create', CreateVerificationServiceAPIController::class)->name('create');
            Route::get('result', GetVerificationResultAPIController::class)->name('result');
            Route::put('upload', UploadImageAPIController::class)->name('upload');
        });

        require __DIR__ . '/api_resources.php';
    });
});
