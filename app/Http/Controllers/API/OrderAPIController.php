<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Response;

/**
 * Class OrderController
 * @package App\Http\Controllers\API
 */

class OrderAPIController extends Controller
{
    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $orders = $query->get();

        return response()->json(OrderResource::collection($orders));
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param CreateOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = Order::create($input);

        return response()->json(new OrderResource($order));
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        return response()->json(new OrderResource($order));
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param int $id
     * @param UpdateOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderAPIRequest $request)
    {
        /** @var Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->fill($request->all());
        $order->save();

        return response()->json(new OrderResource($order));
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            return $this->sendError('Order not found');
        }

        $order->delete();

        return response()->json('Order deleted successfully');
    }
}
