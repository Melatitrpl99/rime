<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountAPIRequest;
use App\Http\Requests\API\UpdateDiscountAPIRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiscountResource;
use Response;

/**
 * Class DiscountController
 * @package App\Http\Controllers\API
 */

class DiscountAPIController extends Controller
{
    /**
     * Display a listing of the Discount.
     * GET|HEAD /discounts
     *
     * @param Request $request
     * @return Response
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

        return $this->sendResponse(DiscountResource::collection($discounts), 'Discounts retrieved successfully');
    }

    /**
     * Store a newly created Discount in storage.
     * POST /discounts
     *
     * @param CreateDiscountAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountAPIRequest $request)
    {
        $input = $request->all();

        /** @var Discount $discount */
        $discount = Discount::create($input);

        return $this->sendResponse(new DiscountResource($discount), 'Discount saved successfully');
    }

    /**
     * Display the specified Discount.
     * GET|HEAD /discounts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        return $this->sendResponse(new DiscountResource($discount), 'Discount retrieved successfully');
    }

    /**
     * Update the specified Discount in storage.
     * PUT/PATCH /discounts/{id}
     *
     * @param int $id
     * @param UpdateDiscountAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountAPIRequest $request)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        $discount->fill($request->all());
        $discount->save();

        return $this->sendResponse(new DiscountResource($discount), 'Discount updated successfully');
    }

    /**
     * Remove the specified Discount from storage.
     * DELETE /discounts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            return $this->sendError('Discount not found');
        }

        $discount->delete();

        return $this->sendSuccess('Discount deleted successfully');
    }
}
