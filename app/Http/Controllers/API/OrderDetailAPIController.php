<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderDetailAPIRequest;
use App\Http\Requests\API\UpdateOrderDetailAPIRequest;
use App\Models\OrderDetail;
use App\Repositories\OrderDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\OrderDetailResource;
use Response;

/**
 * Class OrderDetailController
 * @package App\Http\Controllers\API
 */

class OrderDetailAPIController extends AppBaseController
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepo)
    {
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the OrderDetail.
     * GET|HEAD /orderDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orderDetails = $this->orderDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

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

        $orderDetail = $this->orderDetailRepository->create($input);

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
        $orderDetail = $this->orderDetailRepository->find($id);

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
        $input = $request->all();

        /** @var OrderDetail $orderDetail */
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail = $this->orderDetailRepository->update($input, $id);

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
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            return $this->sendError('Order Detail not found');
        }

        $orderDetail->delete();

        return $this->sendSuccess('Order Detail deleted successfully');
    }
}
