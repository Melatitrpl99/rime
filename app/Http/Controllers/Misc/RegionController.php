<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getRegency(Request $request)
    {
        return Regency::where('province_id', $request->get('province_id'))
            ->pluck('name', 'id');
    }

    public function getDistrict(Request $request)
    {
        return District::where('regency_id', $request->get('regency_id'))
            ->pluck('name', 'id');
    }

    public function getVillage(Request $request)
    {
        return Village::where('district_id', $request->get('district_id'))
            ->pluck('name', 'id');
    }
}
