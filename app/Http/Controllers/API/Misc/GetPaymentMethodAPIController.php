<?php

namespace App\Http\Controllers\API\Misc;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class GetPaymentMethodAPIController extends Controller
{
    public function __invoke(Request $request)
    {
        $paymentMethods = PaymentMethod::all(['id', 'name']);

        return response()->json($paymentMethods);
    }
}
