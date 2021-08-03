<?php

use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\CartProductAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\DiscountAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ColorAPIController;
use App\Http\Controllers\API\DimensionAPIController;
use App\Http\Controllers\API\SizeAPIController;
use App\Http\Controllers\API\ShipmentAPIController;
use App\Http\Controllers\API\TestimonyAPIController;
use App\Http\Controllers\API\TransactionAPIController;
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
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::apiResource('carts', CartAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('carts.products', CartProductAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('categories', CategoryAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('colors', ColorAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('dimensions', DimensionAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('discounts', DiscountAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('orders', OrderAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('products', ProductAPIController::class)
        ->only(['index', 'show'])
        ->missing(function () {
            return response(null, 204);
        });

    Route::apiResource('posts', PostAPIController::class)
        ->only(['index', 'show'])
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('shipments', ShipmentAPIController::class)
        ->except(['index'])
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('sizes', SizeAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('transactions', TransactionAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });

    Route::apiResource('testimonies', TestimonyAPIController::class)
        ->missing(function () {
            return response()->json(['message' => 'Not found'], 404);
        });
});