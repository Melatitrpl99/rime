<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Order;
use Illuminate\Http\Request;
use Str;

class UploadInvoiceAPIController extends Controller
{
    public function __invoke(Order $order, Request $request)
    {
        if (!$request->has(['path'])) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        if ($order->has('invoice')) {
            $order->invoice()->delete();
        }

        $file = $request->file('path');
        $format = $file->getClientOriginalExtension();

        $name = Str::slug($order->nomor);
        $fn = Str::random(16) . '.' . $format;

        $path = $file->storePubliclyAs('public/order', $fn);
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

        $f->fileable()->associate($order);
        $f->save();

        return response()->json(new FileResource($f));
    }
}
