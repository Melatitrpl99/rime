<?php

use App\Http\Controllers\API\ActivityAPIController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\DiscountAPIController;
use App\Http\Controllers\API\EventAPIController;
use App\Http\Controllers\API\FileAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\PostCategoryAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ColorAPIController;
use App\Http\Controllers\API\DimensionAPIController;
use App\Http\Controllers\API\SizeAPIController;
use App\Http\Controllers\API\ProductStockAPIController;
use App\Http\Controllers\API\ShipmentAPIController;
use App\Http\Controllers\API\StatusAPIController;
use App\Http\Controllers\API\TransactionAPIController;
use App\Http\Controllers\API\UserAPIController;
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

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthAPIController::class, 'login']);
    Route::post('register', [AuthAPIController::class, 'register']);
    Route::post('logout', [AuthAPIController::class, 'logout']);
    Route::post('refresh', [AuthAPIController::class, 'refresh']);
    Route::post('me', [AuthAPIController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::apiResource('users', UserAPIController::class);
    Route::apiResource('products', ProductAPIController::class);
    Route::apiResource('product_stocks', ProductStockAPIController::class);
    Route::apiResource('carts', CartAPIController::class);
    Route::apiResource('orders', OrderAPIController::class);
    Route::apiResource('transactions', TransactionAPIController::class);
    Route::apiResource('discounts', DiscountAPIController::class);
    Route::apiResource('events', EventAPIController::class);
    Route::apiResource('files', FileAPIController::class);
    Route::apiResource('post_categories', PostCategoryAPIController::class);
    Route::apiResource('posts', PostAPIController::class);
    Route::apiResource('shipments', ShipmentAPIController::class);
    Route::apiResource('categories', CategoryAPIController::class);
    Route::apiResource('activities', ActivityAPIController::class);
    Route::apiResource('products', ProductAPIController::class);
    Route::apiResource('colors', ColorAPIController::class);
    Route::apiResource('dimensions', DimensionAPIController::class);
    Route::apiResource('sizes', SizeAPIController::class);
    Route::apiResource('statuses', StatusAPIController::class);
});




Route::group(['prefix' => 'admin'], function () {
    Route::resource('shipments', App\Http\Controllers\API\ShipmentAPIController::class);
});
