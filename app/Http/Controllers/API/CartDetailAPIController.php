<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartDetailAPIRequest;
use App\Http\Requests\API\UpdateCartDetailAPIRequest;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartDetailResource;
use Response;

/**
 * Class CartDetailController
 * @package App\Http\Controllers\API
 */

class CartDetailAPIController extends Controller
{
    /**
     * Display a listing of the CartDetail.
     * GET|HEAD /cartDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = CartDetail::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $cartDetails = $query->get();

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

        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::create($input);

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
        $cartDetail = CartDetail::find($id);

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
        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            return $this->sendError('Cart Detail not found');
        }

        $cartDetail->fill($request->all());
        $cartDetail->save();

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
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            return $this->sendError('Cart Detail not found');
        }

        $cartDetail->delete();

        return $this->sendSuccess('Cart Detail deleted successfully');
    }
}
