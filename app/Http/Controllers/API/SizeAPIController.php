<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSizeAPIRequest;
use App\Http\Requests\API\UpdateSizeAPIRequest;
use App\Http\Resources\SizeResource;
use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use App\Models\Size;
use Illuminate\Http\Request;

/**
 * Class SizeAPIController
 * @package App\Http\Controllers\API
 */
class SizeAPIController extends Controller
{
    /**
     * Display a listing of the Size.
     * GET|HEAD /sizes
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Size::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->has('product_id')) {
            $productStock = ProductStock::where('product_id', $request->get('product_id'))
                ->pluck('size_id')
                ->toArray();

            $query->whereIn('id', $productStock);
        }

        $sizes = $query->get();

        return response()->json($sizes);
    }

    /**
     * Display the specified Size.
     * GET|HEAD /sizes/{$size}
     *
     * @param \App\Models\Size $size
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Size $size)
    {
        return response()->json($size);
    }
}
