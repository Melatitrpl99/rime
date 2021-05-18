<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderDetailAPIRequest;
use App\Http\Requests\API\UpdateOrderDetailAPIRequest;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailResource;
use Response;

/**
 * Class OrderDetailController
 * @package App\Http\Controllers\API
 */

class OrderDetailAPIController extends Controller
{
    /**
     * Display a listing of the OrderDetail.
     * GET|HEAD /orderDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OrderDetail::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $orderDetails = $query->get();

        return $this->sendResponse(OrderDetailResource::collection($orderDetails), 'Order Details retrieved successfully');
    }

    /**
     * Store a newly created OrderDetail in storage.
     * POST /orderDetails
     *
     * @param CreateOrderDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::create($input);

        return $this->sendResponse(new OrderDetailResource($orderDetail), 'Order Detail saved successfully');
    }

    /**
     * Display the specified OrderDetail.
     * GET|HEAD /orderDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::find($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        return $this->sendResponse(new OrderDetailResource($orderDetail), 'Order Detail retrieved successfully');
    }

    /**
     * Update the specified OrderDetail in storage.
     * PUT/PATCH /orderDetails/{id}
     *
     * @param int $id
     * @param UpdateOrderDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderDetailAPIRequest $request)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::find($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail->fill($request->all());
        $orderDetail->save();

        return $this->sendResponse(new OrderDetailResource($orderDetail), 'OrderDetail updated successfully');
    }

    /**
     * Remove the specified OrderDetail from storage.
     * DELETE /orderDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::find($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail->delete();

        return $this->sendSuccess('Order Detail deleted successfully');
    }
}
