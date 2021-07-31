<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getKota($provinsiId)
    {
        return Regency::where('province_id', $provinsiId)
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getKecamatan($kotaId)
    {
        return District::where('regency_id', $kotaId)
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getDesaKelurahan($kecamatanId)
    {
        return Village::where('district_id', $kecamatanId)
            ->pluck('name', 'id')
            ->toArray();
    }
}
