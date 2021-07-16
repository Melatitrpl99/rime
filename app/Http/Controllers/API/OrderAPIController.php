<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderAPIController
 * @package App\Http\Controllers\API
 */
class OrderAPIController extends Controller
{
    /**
     * Display a listing of the Order.
     * GET|HEAD /orders
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
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

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => OrderResource::collection($orders)
        ]);
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders
     *
     * @param \App\Http\Requests\CreateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $order = Order::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new OrderResource($order)
        ]);
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new OrderResource($order)
        ]);
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateOrderAPIRequest $request)
    {
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $order->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new OrderResource($order)
        ]);
    }

    /**
     * Remove the specified Order from storage.
     * DELETE /orders/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $order->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}