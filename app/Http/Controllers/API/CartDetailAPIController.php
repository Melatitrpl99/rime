<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartDetailAPIRequest;
use App\Http\Requests\API\UpdateCartDetailAPIRequest;
use App\Models\CartDetail;
use App\Repositories\CartDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CartDetailResource;
use Response;

/**
 * Class CartDetailController
 * @package App\Http\Controllers\API
 */

class CartDetailAPIController extends AppBaseController
{
    /** @var  CartDetailRepository */
    private $cartDetailRepository;

    public function __construct(CartDetailRepository $cartDetailRepo)
    {
        $this->cartDetailRepository = $cartDetailRepo;
    }

    /**
     * Display a listing of the CartDetail.
     * GET|HEAD /cartDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cartDetails = $this->cartDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CartDetailResource::collection($cartDetails), 'Cart Details retrieved successfully');
    }

    /**
     * Store a newly created CartDetail in storage.
     * POST /cartDetails
     *
     * @param CreateCartDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCartDetailAPIRequest $request)
    {
        $input = $request->all();

        $cartDetail = $this->cartDetailRepository->create($input);

        return $this->sendResponse(new CartDetailResource($cartDetail), 'Cart Detail saved successfully');
    }

    /**
     * Display the specified CartDetail.
     * GET|HEAD /cartDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            return $this->sendError('Cart Detail not found');
        }

        return $this->sendResponse(new CartDetailResource($cartDetail), 'Cart Detail retrieved successfully');
    }

    /**
     * Update the specified CartDetail in storage.
     * PUT/PATCH /cartDetails/{id}
     *
     * @param int $id
     * @param UpdateCartDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var CartDetail $cartDetail */
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            return $this->sendError('Cart Detail not found');
        }

        $cartDetail = $this->cartDetailRepository->update($input, $id);

        return $this->sendResponse(new CartDetailResource($cartDetail), 'CartDetail updated successfully');
    }

    /**
     * Remove the specified CartDetail from storage.
     * DELETE /cartDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            return $this->sendError('Cart Detail not found');
        }

        $cartDetail->delete();

        return $this->sendSuccess('Cart Detail deleted successfully');
    }
}
