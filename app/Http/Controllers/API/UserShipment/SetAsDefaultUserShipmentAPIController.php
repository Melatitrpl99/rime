<?php

namespace App\Http\Controllers\API\UserShipment;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserShipmentResource;
use App\Models\UserShipment;
use Illuminate\Http\Request;

class SetAsDefaultUserShipmentAPIController extends Controller
{
    public function __invoke(UserShipment $userShipment, Request $request)
    {
        $userShipments = UserShipment::whereUserId(auth()->id())
            ->whereIsDefault(true)
            ->update(['is_default' => false]);

        if ($userShipments) {
            $userShipment->update(['is_default' => true]);
        }

        return response()->json(new UserShipmentResource($userShipment->load('village.district.regency.province')), 200);
    }
}
