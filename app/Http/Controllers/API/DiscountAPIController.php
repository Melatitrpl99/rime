<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\DiscountResource;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

/**
 * Class DiscountAPIController
 * @package App\Http\Controllers\API
 */
class DiscountAPIController extends Controller
{
    /**
     * Display a listing of the Discount.
     * GET|HEAD /discounts
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Discount::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $discounts = $query->get();

        return response()->json(DiscountResource::collection($discounts));
    }

    /**
     * Display the specified Discount.
     * GET|HEAD /discounts/{$discount}
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Discount $discount)
    {
        return response()->json(new DiscountResource($discount));
    }
}
