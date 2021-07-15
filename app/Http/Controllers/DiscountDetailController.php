<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscountDetailRequest;
use App\Http\Requests\UpdateDiscountDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\DiscountDetail;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiscountDetailController extends Controller
{
    /**
     * Display a listing of the DiscountDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var DiscountDetail $discountDetails */
        $discountDetails = DiscountDetail::paginate();

        return view('admin.discount_details.index')
            ->with('discountDetails', $discountDetails);
    }

    /**
     * Show the form for creating a new DiscountDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.discount_details.create');
    }

    /**
     * Store a newly created DiscountDetail in storage.
     *
     * @param CreateDiscountDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountDetailRequest $request)
    {
        $input = $request->all();

        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::create($input);

        Flash::success('Discount Detail saved successfully.');

        return redirect(route('admin.discount_details.index'));
    }

    /**
     * Display the specified DiscountDetail.
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
            Flash::error('Discount Detail not found');

            return redirect(route('admin.discount_details.index'));
        }

        return view('admin.discount_details.show')->with('discountDetail', $discountDetail);
    }

    /**
     * Show the form for editing the specified DiscountDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('admin.discount_details.index'));
        }

        return view('admin.discount_details.edit')->with('discountDetail', $discountDetail);
    }

    /**
     * Update the specified DiscountDetail in storage.
     *
     * @param int $id
     * @param UpdateDiscountDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountDetailRequest $request)
    {
        /** @var DiscountDetail $discountDetail */
        $discountDetail = DiscountDetail::find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('admin.discount_details.index'));
        }

        $discountDetail->fill($request->all());
        $discountDetail->save();

        Flash::success('Discount Detail updated successfully.');

        return redirect(route('admin.discount_details.index'));
    }

    /**
     * Remove the specified DiscountDetail from storage.
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
            Flash::error('Discount Detail not found');

            return redirect(route('admin.discount_details.index'));
        }

        $discountDetail->delete();

        Flash::success('Discount Detail deleted successfully.');

        return redirect(route('admin.discount_details.index'));
    }
}
