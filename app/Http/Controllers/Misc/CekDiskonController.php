<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class CekDiskonController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $diskon = $request->get('diskon');

        return response(['exists' => Discount::where('kode', $diskon)->exists()]);
    }
}
