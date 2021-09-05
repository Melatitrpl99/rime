<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class ColorAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ids = ProductStock::where('product_id', $request->get('product_id'))
            ->pluck('color_id')
            ->toArray();

        $colors = Color::whereIn('id', $ids)->get(['id', 'name', 'rgba_color']);

        return response()->json($colors,);
    }
}
