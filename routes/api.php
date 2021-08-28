<?php

use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\DiscountAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ColorAPIController;
use App\Http\Controllers\API\Misc\GetShipmentDetailsController;
use App\Http\Controllers\API\SizeAPIController;
use App\Http\Controllers\API\ShipmentAPIController;
use App\Http\Controllers\API\TestimonyAPIController;
use App\Http\Controllers\API\UserAPIController;
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
    Route::post('refresh', [AuthAPIController::class, 'refresh']);
    Route::post('me', [AuthAPIController::class, 'me']);

    Route::group(['middleware' => 'jwt.auth'], function () {
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

        Route::apiResource('colors', ColorAPIController::class)
            ->only('index')
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('sizes', SizeAPIController::class)
            ->only('index')
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('carts', CartAPIController::class)
            ->missing(response()->error('Tidak ditemukan'));

        Route::apiResource('discounts', DiscountAPIController::class)
            ->only(['index', 'show'])
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('orders', OrderAPIController::class)
            ->except(['destroy'])
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('products', ProductAPIController::class)
            ->only(['index', 'show'])
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('posts', PostAPIController::class)
            ->only(['index', 'show'])
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('shipments', ShipmentAPIController::class)
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('testimonies', TestimonyAPIController::class)
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('user_verifications', UserVerificationAPIController::class)
            ->only(['index', 'store', 'show'])
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });

        Route::apiResource('users', UserAPIController::class)
            ->except('index')
            ->missing(function () {
                return response()->error('Tidak ditemukan');
            });
    });
});
