<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAdditionalCostAPIRequest;
use App\Http\Requests\API\UpdateAdditionalCostAPIRequest;
use App\Models\AdditionalCost;
use App\Repositories\AdditionalCostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AdditionalCostResource;
use Response;

/**
 * Class AdditionalCostController
 * @package App\Http\Controllers\API
 */

class AdditionalCostAPIController extends AppBaseController
{
    /** @var  AdditionalCostRepository */
    private $additionalCostRepository;

    public function __construct(AdditionalCostRepository $additionalCostRepo)
    {
        $this->additionalCostRepository = $additionalCostRepo;
    }

    /**
     * Display a listing of the AdditionalCost.
     * GET|HEAD /additionalCosts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $additionalCosts = $this->additionalCostRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AdditionalCostResource::collection($additionalCosts), 'Additional Costs retrieved successfully');
    }

    /**
     * Store a newly created AdditionalCost in storage.
     * POST /additionalCosts
     *
     * @param CreateAdditionalCostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdditionalCostAPIRequest $request)
    {
        $input = $request->all();

        $additionalCost = $this->additionalCostRepository->create($input);

        return $this->sendResponse(new AdditionalCostResource($additionalCost), 'Additional Cost saved successfully');
    }

    /**
     * Display the specified AdditionalCost.
     * GET|HEAD /additionalCosts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AdditionalCost $additionalCost */
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            return $this->sendError('Additional Cost not found');
        }

        return $this->sendResponse(new AdditionalCostResource($additionalCost), 'Additional Cost retrieved successfully');
    }

    /**
     * Update the specified AdditionalCost in storage.
     * PUT/PATCH /additionalCosts/{id}
     *
     * @param int $id
     * @param UpdateAdditionalCostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdditionalCostAPIRequest $request)
    {
        $input = $request->all();

        /** @var AdditionalCost $additionalCost */
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            return $this->sendError('Additional Cost not found');
        }

        $additionalCost = $this->additionalCostRepository->update($input, $id);

        return $this->sendResponse(new AdditionalCostResource($additionalCost), 'AdditionalCost updated successfully');
    }

    /**
     * Remove the specified AdditionalCost from storage.
     * DELETE /additionalCosts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AdditionalCost $additionalCost */
        $additionalCost = $this->additionalCostRepository->find($id);

        if (empty($additionalCost)) {
            return $this->sendError('Additional Cost not found');
        }

        $additionalCost->delete();

        return $this->sendSuccess('Additional Cost deleted successfully');
    }
}
