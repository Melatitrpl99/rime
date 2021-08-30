<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;
use Response;

class APIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Return success response using JSON instance
         */
        Response::macro('success', function ($data, $code = 200, $message = 'Sukses', $status = 'success'): JsonResponse {
            return response()->json([
                'message' => $message,
                'status' => $status,
                'data' => $data,
            ], $code);
        });

        /**
         * Return empty response using JSON instance
         */
        Response::macro('empty', function ($message = 'Kosong'): JsonResponse {
            return response()->json([
                'message' => $message,
                'status' => 'empty',
                'data' => null,
            ], 204);
        });

        /**
         * Return error response using JSON instance
         */
        Response::macro('error', function ($error = 'Terjadi error', $code = 404, $status = 'error'): JsonResponse {
            return response()->json([
                'message' => $error,
                'status' => $status,
            ], $code);
        });

        /**
         * Return invalid response using JSON instance
         */
        Response::macro('invalid', function ($error = 'Tidak dapat memproses permintaan'): JsonResponse {
            return response()->json([
                'message' => $error,
                'status' => 'invalid',
            ], 400);
        });

        /**
         * Return unauthenticated response using JSON instance
         */
        Response::macro('unauthenticated', function ($error = 'Anda harus login terlebih dahulu'): JsonResponse {
            return response()->json([
                'message' => $error,
                'status' => 'unauthenticated',
            ], 401);
        });

        /**
         * Return unauthorized response using JSON instance
         */
        Response::macro('unauthorized', function ($error = 'Anda tidak diizinkan untuk mengakses fitur ini'): JsonResponse {
            return response()->json([
                'message' => $error,
                'status' => 'unauthorized',
            ], 403);
        });

        /**
         * Return unprocessed response using JSON instance
         */
        Response::macro('unprocessed', function ($error = 'Terjadi kesalahan ketika memproses permintaan'): JsonResponse {
            return response()->json([
                'status' => 'unproceessed',
                'message' => $error,
            ], 422);
        });
    }
}
