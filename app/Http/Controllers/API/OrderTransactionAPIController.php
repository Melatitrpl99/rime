<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\File;
use App\Models\Order;
use App\Models\OrderTransaction;
use Faker\Factory;
use Illuminate\Http\Request;
use Str;

class OrderTransactionAPIController extends Controller
{
    public function __invoke(Order $order, Request $request)
    {
        if (!$request->has(['path'])) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $faker = Factory::create();
        $nomor = $faker->regexify('T[0-9]{2}-[A-Z0-9]{6}');

        $orderTransaction = OrderTransaction::updateOrCreate(
            ['order_id' => $order->id],
            [
                'nomor'         => $nomor,
                'tanggal_masuk' => now(),
                'total'         => $order->total + $order->biaya_pengiriman - $order->products()->sum('order_details.diskon'),
            ]
        );

        $file = $request->file('path');
        $format = $file->getClientOriginalExtension();

        $name = Str::slug($nomor);
        $fn = Str::random(16) . '.' . $format;

        $path = $file->storePubliclyAs('public/order_transactions', $fn);
        $path = Str::after($path, 'public/');
        $path = 'storage/' . $path;

        $f = new File();
        $f->fill([
            'name'      => $name,
            'mime_type' => $file->getMimeType(),
            'format'    => $format,
            'size'      => $file->getSize(),
            'path'      => $path,
            'url'       => asset($path),
        ]);

        $f->fileable()->associate($orderTransaction);
        $f->save();

        return response()->json($order->orderTransaction()->exists(), 200);
    }
}
