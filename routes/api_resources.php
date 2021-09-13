<?php

use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\ColorAPIController;
use App\Http\Controllers\API\OrderAPIController;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\SizeAPIController;
use App\Http\Controllers\API\TestimonyAPIController;
use App\Http\Controllers\API\UserShipmentAPIController;
use Illuminate\Support\Facades\Route;

Route::apiResource('colors', ColorAPIController::class)
    ->only('index')
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('sizes', SizeAPIController::class)
    ->only('index')
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('carts', CartAPIController::class)
    ->missing(response()->json(['message' => 'Tidak ditemukan']));

Route::apiResource('orders', OrderAPIController::class)
    ->except(['update', 'destroy'])
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('products', ProductAPIController::class)
    ->only(['index', 'show'])
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('posts', PostAPIController::class)
    ->only(['index', 'show'])
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('user_shipments', UserShipmentAPIController::class)
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });

Route::apiResource('testimonies', TestimonyAPIController::class)
    ->missing(function () {
        return response()->json(['message' => 'Tidak ditemukan']);
    });
