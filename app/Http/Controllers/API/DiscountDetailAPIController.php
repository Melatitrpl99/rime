<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscountDetailAPIRequest;
use App\Http\Requests\API\UpdateDiscountDetailAPIRequest;
use App\Models\DiscountDetail;
use App\Repositories\DiscountDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DiscountDetailResource;
use Response;

/**
 * Class DiscountDetailController
 * @package App\Http\Controllers\API
 */

class DiscountDetailAPIController extends AppBaseController
{
    /** @var  DiscountDetailRepository */
    private $discountDetailRepository;

    public function __construct(DiscountDetailRepository $discountDetailRepo)
    {
        $this->discountDetailRepository = $discountDetailRepo;
    }

    /**
     * Display a listing of the DiscountDetail.
     * GET|HEAD /discountDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $discountDetails = $this->discountDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

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

        $discountDetail = $this->discountDetailRepository->create($input);

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
        $discountDetail = $this->discountDetailRepository->find($id);

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
        $input = $request->all();

        /** @var DiscountDetail $discountDetail */
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            return $this->sendError('Discount Detail not found');
        }

        $discountDetail = $this->discountDetailRepository->update($input, $id);

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
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            return $this->sendError('Discount Detail not found');
        }

        $discountDetail->delete();

        return $this->sendSuccess('Discount Detail deleted successfully');
    }
}
