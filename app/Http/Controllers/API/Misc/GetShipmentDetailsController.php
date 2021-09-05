<?php

namespace App\Http\Controllers\API\Misc;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class GetShipmentDetailsController extends Controller
{
    public function getProvinces(Request $request)
    {
        if ($request->has('village_id')) {
            $id = $request->get('village_id');
            $province = Village::find($id)->province;

            return response()->json([$province], 200);
        }

        if ($request->has('district_id')) {
            $id = $request->get('district_id');
            $province = District::find($id)->province;

            return response()->json([$province], 200);
        }

        if ($request->has('regency_id')) {
            $id = $request->get('regency_id');
            $province = Regency::find($id)->province;

            return response()->json([$province], 200);
        }

        if ($request->has('id')) {
            $id = $request->get('id');
            $province = Province::find($id);

            return response()->json([$province], 200);
        }

        $provinces = Province::all();

        return response()->json($provinces, 200);
    }

    public function getRegencies(Request $request)
    {
        if ($request->has('district_id')) {
            $id = $request->get('district_id');
            $regency = District::find($id)->regency;

            return response()->json([$regency], 200);
        }

        if ($request->has('village_id')) {
            $id = $request->get('village_id');
            $regency = Village::find($id)->regency;

            return response()->json([$regency], 200);
        }

        if ($request->has('province_id')) {
            $id = $request->get('province_id');
            $regencies = Province::find($id)->regencies;

            return response()->json($regencies, 200);
        }

        if ($request->has('id')) {
            $id = $request->get('id');
            $regency = Regency::find($id);

            return response()->json($regency, 200);
        }

        $regencies = Regency::all();

        return response()->json($regencies, 200);
    }

    public function getDistricts(Request $request)
    {
        if ($request->has('province_id')) {
            $id = $request->get('province_id');
            $districts = Province::find($id)->districts;

            return response()->json($districts, 200);
        }

        if ($request->has('regency_id')) {
            $id = $request->get('regency_id');
            $districts = Regency::find($id)->districts;

            return response()->json($districts, 200);
        }

        if ($request->has('village_id')) {
            $id = $request->get('village_id');
            $district = Village::find($id)->district;

            return response()->json([$district], 200);
        }

        if ($request->has('id')) {
            $id = $request->get('id');
            $district = District::find($id);

            return response()->json($district, 200);
        }

        $districts = District::all();

        return response()->json($districts, 200);
    }

    public function getVillages(Request $request)
    {
        if ($request->has('province_id')) {
            $id = $request->get('province_id');
            $villages = Province::find($id)->villages;

            return response()->json($villages, 200);
        }

        if ($request->has('regency_id')) {
            $id = $request->get('regency_id');
            $villages = Regency::find($id)->villages;

            return response()->json($villages, 200);
        }

        if ($request->has('district_id')) {
            $id = $request->get('district_id');
            $villages = District::find($id)->villages;

            return response()->json($villages, 200);
        }

        if ($request->has('id')) {
            $id = $request->get('id');
            $village = Village::find($id);

            return response()->json([$village], 200);
        }

        $villages = Village::all();

        return response()->json($villages, 200);
    }
}
