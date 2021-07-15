<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Flash;
use Response;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the OrderDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var OrderDetail $orderDetails */
        $orderDetails = OrderDetail::paginate();

        return view('admin.order_details.index')
            ->with('orderDetails', $orderDetails);
    }

    /**
     * Show the form for creating a new OrderDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.order_details.create');
    }

    /**
     * Store a newly created OrderDetail in storage.
     *
     * @param CreateOrderDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderDetailRequest $request)
    {
        $input = $request->all();

        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::create($input);

        Flash::success('Order Detail saved successfully.');

        return redirect(route('admin.order_details.index'));
    }

    /**
     * Display the specified OrderDetail.
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
            Flash::error('Order Detail not found');

            return redirect(route('admin.order_details.index'));
        }

        return view('admin.order_details.show')->with('orderDetail', $orderDetail);
    }

    /**
     * Show the form for editing the specified OrderDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.order_details.index'));
        }

        return view('admin.order_details.edit')->with('orderDetail', $orderDetail);
    }

    /**
     * Update the specified OrderDetail in storage.
     *
     * @param int $id
     * @param UpdateOrderDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderDetailRequest $request)
    {
        /** @var OrderDetail $orderDetail */
        $orderDetail = OrderDetail::find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.order_details.index'));
        }

        $orderDetail->fill($request->all());
        $orderDetail->save();

        Flash::success('Order Detail updated successfully.');

        return redirect(route('admin.order_details.index'));
    }

    /**
     * Remove the specified OrderDetail from storage.
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
            Flash::error('Order Detail not found');

            return redirect(route('admin.order_details.index'));
        }

        $orderDetail->delete();

        Flash::success('Order Detail deleted successfully.');

        return redirect(route('admin.order_details.index'));
    }
}
