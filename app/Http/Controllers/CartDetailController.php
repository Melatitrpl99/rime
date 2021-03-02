<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartDetailRequest;
use App\Http\Requests\UpdateCartDetailRequest;
use App\Repositories\CartDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CartDetailController extends AppBaseController
{
    /** @var  CartDetailRepository */
    private $cartDetailRepository;

    public function __construct(CartDetailRepository $cartDetailRepo)
    {
        $this->cartDetailRepository = $cartDetailRepo;
    }

    /**
     * Display a listing of the CartDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cartDetails = $this->cartDetailRepository->all();

        return view('cart_details.index')
            ->with('cartDetails', $cartDetails);
    }

    /**
     * Show the form for creating a new CartDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('cart_details.create');
    }

    /**
     * Store a newly created CartDetail in storage.
     *
     * @param CreateCartDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateCartDetailRequest $request)
    {
        $input = $request->all();

        $cartDetail = $this->cartDetailRepository->create($input);

        Flash::success('Cart Detail saved successfully.');

        return redirect(route('cartDetails.index'));
    }

    /**
     * Display the specified CartDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('cartDetails.index'));
        }

        return view('cart_details.show')->with('cartDetail', $cartDetail);
    }

    /**
     * Show the form for editing the specified CartDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('cartDetails.index'));
        }

        return view('cart_details.edit')->with('cartDetail', $cartDetail);
    }

    /**
     * Update the specified CartDetail in storage.
     *
     * @param int $id
     * @param UpdateCartDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartDetailRequest $request)
    {
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('cartDetails.index'));
        }

        $cartDetail = $this->cartDetailRepository->update($request->all(), $id);

        Flash::success('Cart Detail updated successfully.');

        return redirect(route('cartDetails.index'));
    }

    /**
     * Remove the specified CartDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cartDetail = $this->cartDetailRepository->find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('cartDetails.index'));
        }

        $this->cartDetailRepository->delete($id);

        Flash::success('Cart Detail deleted successfully.');

        return redirect(route('cartDetails.index'));
    }
}
