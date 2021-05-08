<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdditionalCostRequest;
use App\Http\Requests\UpdateAdditionalCostRequest;
use App\Repositories\AdditionalCostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdditionalCostController extends AppBaseController
{
    /** @var  AdditionalCostRepository */
    private $additionalCostRepository;

    public function __construct(AdditionalCostRepository $additionalCostRepo)
    {
        $this->additionalCostRepository = $additionalCostRepo;
    }

    /**
     * Display a listing of the AdditionalCost.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $additionalCosts = $this->additionalCostRepository->all();

        return view('admin.additional_costs.index')
            ->with('additionalCosts', $additionalCosts);
    }

    /**
     * Show the form for creating a new AdditionalCost.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.additional_costs.create');
    }

    /**
     * Store a newly created AdditionalCost in storage.
     *
     * @param CreateAdditionalCostRequest $request
     *
     * @return Response
     */
    public function store(CreateAdditionalCostRequest $request)
    {
        $input = $request->all();

        $additionalCost = $this->additionalCostRepository->create($input);

        Flash::success('Additional Cost saved successfully.');

        return redirect(route('admin.additionalCosts.index'));
    }

    /**
     * Display the specified AdditionalCost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            Flash::error('Additional Cost not found');

            return redirect(route('admin.additionalCosts.index'));
        }

        return view('admin.additional_costs.show')->with('additionalCost', $additionalCost);
    }

    /**
     * Show the form for editing the specified AdditionalCost.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            Flash::error('Additional Cost not found');

            return redirect(route('admin.additionalCosts.index'));
        }

        return view('admin.additional_costs.edit')->with('additionalCost', $additionalCost);
    }

    /**
     * Update the specified AdditionalCost in storage.
     *
     * @param int $id
     * @param UpdateAdditionalCostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdditionalCostRequest $request)
    {
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            Flash::error('Additional Cost not found');

            return redirect(route('admin.additionalCosts.index'));
        }

        $additionalCost = $this->additionalCostRepository->update($request->all(), $id);

        Flash::success('Additional Cost updated successfully.');

        return redirect(route('admin.additionalCosts.index'));
    }

    /**
     * Remove the specified AdditionalCost from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            Flash::error('Additional Cost not found');

            return redirect(route('admin.additionalCosts.index'));
        }

        $this->additionalCostRepository->delete($id);

        Flash::success('Additional Cost deleted successfully.');

        return redirect(route('admin.additionalCosts.index'));
    }
}
