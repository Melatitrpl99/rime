<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ColorResource;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductStock;
use Illuminate\Http\Request;

/**
 * Class ColorAPIController
 * @package App\Http\Controllers\API
 */
class ColorAPIController extends Controller
{
    /**
     * Display a listing of the Color.
     * GET|HEAD /colors
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Color::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->filled('product_id')) {
            $productStocks = ProductStock::select('color_id')->where('product_id', $request->get('product_id'));

            if ($request->filled('size_id')) {
                $productStocks->where('size_id', $request->get('size_id'));
            }

            $productStocks->pluck('color_id')->toArray();

            $query->whereIn('id', $productStocks);
        }

        $colors = $query->get();

        return response()->json($colors);
    }

    /**
     * Display the specified Color.
     * GET|HEAD /colors/{$color}
     *
     * @param \App\Models\Color $color
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Color $color)
    {
        return response()->json($color);
    }
}
