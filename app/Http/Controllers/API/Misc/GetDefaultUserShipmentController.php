<?php

namespace App\Http\Controllers\API\Misc;

use App\Http\Controllers\Controller;
use App\Models\UserShipment;
use Illuminate\Http\Request;

class GetDefaultUserShipmentController extends Controller
{
    public function __invoke(Request $request)
    {
        //
        $shipment = UserShipment::isDefault()->first(['id', 'alamat']);

        return response()->json($shipment);
    }
}
