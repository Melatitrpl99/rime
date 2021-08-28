<?php

namespace App\Providers;

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
        Response::macro('success', function ($data, $code = 200, $message = "Sukses", $status = "success") {
            return response()->json([
                'message' => $message,
                'status' => $status,
                'data' => $data,
            ], $code);
        });

        Response::macro('empty', function ($message = "Kosong") {
            return response()->json([
                'message' => $message,
                'status' => 'empty',
                'data' => null,
            ], 204);
        });

        Response::macro('error', function ($error = "Terjadi error", $code = 404, $status = "error") {
            return response()->json([
                'message' => $error,
                'status' => $status,
            ], $code);
        });

        Response::macro('invalid', function ($error = "Tidak dapat memproses permintaan") {
            return response()->json([
                'message' => $error,
                'status' => 'invalid',
            ], 400);
        });

        Response::macro('unauthenticated', function ($error = "Anda harus login terlebih dahulu") {
            return response()->json([
                'message' => $error,
                'status' => 'unauthenticated',
            ], 401);
        });

        Response::macro('unauthorized', function ($error = "Anda tidak diizinkan untuk mengakses fitur ini") {
            return response()->json([
                'message' => $error,
                'status' => 'unauthorized',
            ], 403);
        });

        Response::macro('unprocessed', function ($error = "Terjadi kesalahan ketika memproses permintaan") {
            return response()->json([
                'status' => 'unproceessed',
                'message' => $error,
            ], 422);
        });
    }
}
