<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountDetailAPIRequest;
use App\Http\Requests\API\UpdateDiscountDetailAPIRequest;
use App\Models\DiscountDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiscountDetailResource;
use Response;

/**
 * Class DiscountDetailController
 * @package App\Http\Controllers\API
 */

class DiscountDetailAPIController extends Controller
{
    /**
     * Display a listing of the DiscountDetail.
     * GET|HEAD /discountDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = DiscountDetail::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $discountDetails = $query->get();

        return $this->sendResponse(DiscountDetailResource::collection($discountDetails), 'Discount Details retrieved successfully');
    }

    /**
     * Store a newly created DiscountDetail in storage.
     * POST /discountDetails
     *
     * @param CreateDiscountDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::create($input);

        return $this->sendResponse(new DiscountDetailResource($discountDetail), 'Discount Detail saved successfully');
    }

    /**
     * Display the specified DiscountDetail.
     * GET|HEAD /discountDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::find($id);

        if (empty($discountDetail)) {
            return $this->sendError('Discount Detail not found');
        }

        return $this->sendResponse(new DiscountDetailResource($discountDetail), 'Discount Detail retrieved successfully');
    }

    /**
     * Update the specified DiscountDetail in storage.
     * PUT/PATCH /discountDetails/{id}
     *
     * @param int $id
     * @param UpdateDiscountDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountDetailAPIRequest $request)
    {
        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::find($id);

        if (empty($discountDetail)) {
            return $this->sendError('Discount Detail not found');
        }

        $discountDetail->fill($request->all());
        $discountDetail->save();

        return $this->sendResponse(new DiscountDetailResource($discountDetail), 'DiscountDetail updated successfully');
    }

    /**
     * Remove the specified DiscountDetail from storage.
     * DELETE /discountDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::find($id);

        if (empty($discountDetail)) {
            return $this->sendError('Discount Detail not found');
        }

        $discountDetail->delete();

        return $this->sendSuccess('Discount Detail deleted successfully');
    }
}
