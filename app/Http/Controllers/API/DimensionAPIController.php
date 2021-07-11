<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDimensionAPIRequest;
use App\Http\Requests\API\UpdateDimensionAPIRequest;
use App\Models\Dimension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DimensionResource;
use Response;

/**
 * Class DimensionController
 * @package App\Http\Controllers\API
 */

class DimensionAPIController extends Controller
{
    /**
     * Display a listing of the Dimension.
     * GET|HEAD /dimensions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Dimension::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $dimensions = $query->get();

        return response()->json(DimensionResource::collection($dimensions));
    }

    /**
     * Store a newly created Dimension in storage.
     * POST /dimensions
     *
     * @param CreateDimensionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDimensionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dimension $dimension */
        $dimension = Dimension::create($input);

        return response()->json(new DimensionResource($dimension));
    }

    /**
     * Display the specified Dimension.
     * GET|HEAD /dimensions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            return $this->sendError('Product Dimension not found');
        }

        return response(new DimensionResource($dimension));
    }

    /**
     * Update the specified Dimension in storage.
     * PUT/PATCH /dimensions/{id}
     *
     * @param int $id
     * @param UpdateDimensionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDimensionAPIRequest $request)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            return $this->sendError('Product Dimension not found');
        }

        $dimension->fill($request->all());
        $dimension->save();

        return response()->json(new DimensionResource($dimension));
    }

    /**
     * Remove the specified Dimension from storage.
     * DELETE /dimensions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            return $this->sendError('Product Dimension not found');
        }

        $dimension->delete();

        return response()->json('Product Dimension deleted successfully');
    }
}
