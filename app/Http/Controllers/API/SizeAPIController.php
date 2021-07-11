<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSizeAPIRequest;
use App\Http\Requests\API\UpdateSizeAPIRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SizeResource;
use Response;

/**
 * Class SizeController
 * @package App\Http\Controllers\API
 */

class SizeAPIController extends Controller
{
    /**
     * Display a listing of the Size.
     * GET|HEAD /sizes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Size::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $sizes = $query->get();

        return response()->json(SizeResource::collection($sizes));
    }

    /**
     * Store a newly created Size in storage.
     * POST /sizes
     *
     * @param CreateSizeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSizeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Size $size */
        $size = Size::create($input);

        return response()->json(new SizeResource($size));
    }

    /**
     * Display the specified Size.
     * GET|HEAD /sizes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            return $this->sendError('Product Size not found');
        }

        return response()->json(new SizeResource($size));
    }

    /**
     * Update the specified Size in storage.
     * PUT/PATCH /sizes/{id}
     *
     * @param int $id
     * @param UpdateSizeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSizeAPIRequest $request)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            return $this->sendError('Product Size not found');
        }

        $size->fill($request->all());
        $size->save();

        return response()->json(new SizeResource($size));
    }

    /**
     * Remove the specified Size from storage.
     * DELETE /sizes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            return $this->sendError('Product Size not found');
        }

        $size->delete();

        return response()->json('Product Size deleted successfully');
    }
}
