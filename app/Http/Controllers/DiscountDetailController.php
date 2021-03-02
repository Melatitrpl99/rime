<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscountDetailRequest;
use App\Http\Requests\UpdateDiscountDetailRequest;
use App\Repositories\DiscountDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiscountDetailController extends AppBaseController
{
    /** @var  DiscountDetailRepository */
    private $discountDetailRepository;

    public function __construct(DiscountDetailRepository $discountDetailRepo)
    {
        $this->discountDetailRepository = $discountDetailRepo;
    }

    /**
     * Display a listing of the DiscountDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $discountDetails = $this->discountDetailRepository->all();

        return view('discount_details.index')
            ->with('discountDetails', $discountDetails);
    }

    /**
     * Show the form for creating a new DiscountDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('discount_details.create');
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

        $discountDetail = $this->discountDetailRepository->create($input);

        Flash::success('Discount Detail saved successfully.');

        return redirect(route('discountDetails.index'));
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
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('discountDetails.index'));
        }

        return view('discount_details.show')->with('discountDetail', $discountDetail);
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
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('discountDetails.index'));
        }

        return view('discount_details.edit')->with('discountDetail', $discountDetail);
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
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('discountDetails.index'));
        }

        $discountDetail = $this->discountDetailRepository->update($request->all(), $id);

        Flash::success('Discount Detail updated successfully.');

        return redirect(route('discountDetails.index'));
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
        $discountDetail = $this->discountDetailRepository->find($id);

        if (empty($discountDetail)) {
            Flash::error('Discount Detail not found');

            return redirect(route('discountDetails.index'));
        }

        $this->discountDetailRepository->delete($id);

        Flash::success('Discount Detail deleted successfully.');

        return redirect(route('discountDetails.index'));
    }
}
