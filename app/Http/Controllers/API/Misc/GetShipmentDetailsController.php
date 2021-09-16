<?php

namespace App\Http\Controllers\API\Misc;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use DB;
use Illuminate\Http\Request;

class GetShipmentDetailsController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = Province::all();

        return response()->json($provinces, 200);
    }

    public function getRegencies(Request $request)
    {
        $regencies = Regency::whereRelation('province', 'name', 'LIKE', '%' . $request->get('province') . '%')->get();

        return response()->json($regencies, 200);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::whereRelation('regency', 'name', 'LIKE', '%' . $request->get('regency') . '%')->get();

        return response()->json($districts, 200);
    }

    public function getVillages(Request $request)
    {
        $villages = Village::whereRelation('district', 'name', 'LIKE', '%' . $request->get('district') . '%')->get();

        return response()->json($villages, 200);
    }
}
