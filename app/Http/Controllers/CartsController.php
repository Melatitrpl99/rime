<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartsRequest;
use App\Http\Requests\UpdateCartsRequest;
use App\Repositories\CartsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CartsController extends AppBaseController
{
    /** @var  CartsRepository */
    private $cartsRepository;

    public function __construct(CartsRepository $cartsRepo)
    {
        $this->cartsRepository = $cartsRepo;
    }

    /**
     * Display a listing of the Carts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartsRepository->all();

        return view('carts.index')
            ->with('carts', $carts);
    }

    /**
     * Show the form for creating a new Carts.
     *
     * @return Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created Carts in storage.
     *
     * @param CreateCartsRequest $request
     *
     * @return Response
     */
    public function store(CreateCartsRequest $request)
    {
        $input = $request->all();

        $carts = $this->cartsRepository->create($input);

        Flash::success('Carts saved successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Carts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carts = $this->cartsRepository->find($id);

        if (empty($carts)) {
            Flash::error('Carts not found');

            return redirect(route('carts.index'));
        }

        return view('carts.show')->with('carts', $carts);
    }

    /**
     * Show the form for editing the specified Carts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carts = $this->cartsRepository->find($id);

        if (empty($carts)) {
            Flash::error('Carts not found');

            return redirect(route('carts.index'));
        }

        return view('carts.edit')->with('carts', $carts);
    }

    /**
     * Update the specified Carts in storage.
     *
     * @param int $id
     * @param UpdateCartsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartsRequest $request)
    {
        $carts = $this->cartsRepository->find($id);

        if (empty($carts)) {
            Flash::error('Carts not found');

            return redirect(route('carts.index'));
        }

        $carts = $this->cartsRepository->update($request->all(), $id);

        Flash::success('Carts updated successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Carts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carts = $this->cartsRepository->find($id);

        if (empty($carts)) {
            Flash::error('Carts not found');

            return redirect(route('carts.index'));
        }

        $this->cartsRepository->delete($id);

        Flash::success('Carts deleted successfully.');

        return redirect(route('carts.index'));
    }
}
