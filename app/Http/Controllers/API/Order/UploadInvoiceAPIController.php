<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubmitTransactionDetailAPIRequest;
use App\Models\Order;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class UploadInvoiceAPIController extends Controller
{
    use FileUpload;

    public function __invoke(Order $order, SubmitTransactionDetailAPIRequest $request)
    {
        if ($order->has('invoice')) {
            $order->invoice()->delete();
        }
    }
}
