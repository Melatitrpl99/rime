<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\DeliveryCost;
use App\Models\Regency;
use App\Models\UserShipment;
use Illuminate\Http\Request;

class CalculateDeliveryCostAPIController extends Controller
{
    public function __invoke(UserShipment $userShipment)
    {
        $regency = $userShipment->village->regency;
        $cost = DeliveryCost::firstWhere('regency_id', $regency->id);

        if ($cost) {
            return response()->json(['cost' => $cost->harga], 200);
        }

        return response()->json(40000, 200);
    }
}
