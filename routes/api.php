<?php

use App\Http\Controllers\API\AuthAPIController;
use Illuminate\Http\Request;
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

// Route::resource('users', App\Http\Controllers\API\UserAPIController::class);


Route::group(['prefix' => 'admin'], function () {
    Route::resource('products', App\Http\Controllers\API\ProductAPIController::class);
    Route::resource('product_stocks', App\Http\Controllers\API\ProductStockAPIController::class);
    Route::resource('carts', App\Http\Controllers\API\CartAPIController::class);
    //Route::resource('cart_details', App\Http\Controllers\API\CartDetailAPIController::class);
    Route::resource('orders', App\Http\Controllers\API\OrderAPIController::class);
    //Route::resource('order_details', App\Http\Controllers\API\OrderDetailAPIController::class);
    Route::resource('transactions', App\Http\Controllers\API\TransactionAPIController::class);
    //Route::resource('transaction_details', App\Http\Controllers\API\TransactionDetailAPIController::class);
    Route::resource('discounts', App\Http\Controllers\API\DiscountAPIController::class);
    //Route::resource('discount_details', App\Http\Controllers\API\DiscountDetailAPIController::class);
    Route::resource('events', App\Http\Controllers\API\EventAPIController::class);
    Route::resource('files', App\Http\Controllers\API\FileAPIController::class);
    Route::resource('file_thumbs', App\Http\Controllers\API\FileThumbAPIController::class);
    Route::resource('post_categories', App\Http\Controllers\API\PostCategoryAPIController::class);
    Route::resource('posts', App\Http\Controllers\API\PostAPIController::class);
    Route::resource('shipments', App\Http\Controllers\API\ShipmentAPIController::class);
    Route::resource('categories', App\Http\Controllers\API\CategoryAPIController::class);
});
