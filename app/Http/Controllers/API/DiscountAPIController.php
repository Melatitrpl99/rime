<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountAPIRequest;
use App\Http\Requests\API\UpdateDiscountAPIRequest;
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

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $discounts = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => DiscountResource::collection($discounts)
        ]);
    }

    /**
     * Store a newly created Discount in storage.
     * POST /discounts
     *
     * @param \App\Http\Requests\CreateDiscountRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateDiscountAPIRequest $request)
    {
        $discount = Discount::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new DiscountResource($discount)
        ]);
    }

    /**
     * Display the specified Discount.
     * GET|HEAD /discounts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new DiscountResource($discount)
        ]);
    }

    /**
     * Update the specified Discount in storage.
     * PUT/PATCH /discounts/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateDiscountRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateDiscountAPIRequest $request)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $discount->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new DiscountResource($discount)
        ]);
    }

    /**
     * Remove the specified Discount from storage.
     * DELETE /discounts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $discount->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}