<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Repositories\OrderDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OrderDetailController extends AppBaseController
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepo)
    {
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the OrderDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orderDetails = $this->orderDetailRepository->all();

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

        $orderDetail = $this->orderDetailRepository->create($input);

        Flash::success('Order Detail saved successfully.');

        return redirect(route('admin.orderDetails.index'));
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
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.orderDetails.index'));
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
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.orderDetails.index'));
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
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.orderDetails.index'));
        }

        $orderDetail = $this->orderDetailRepository->update($request->all(), $id);

        Flash::success('Order Detail updated successfully.');

        return redirect(route('admin.orderDetails.index'));
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
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('admin.orderDetails.index'));
        }

        $this->orderDetailRepository->delete($id);

        Flash::success('Order Detail deleted successfully.');

        return redirect(route('admin.orderDetails.index'));
    }
}