<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusAPIRequest;
use App\Http\Requests\API\UpdateStatusAPIRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use Response;

/**
 * Class StatusController
 * @package App\Http\Controllers\API
 */

class StatusAPIController extends Controller
{
    /**
     * Display a listing of the Status.
     * GET|HEAD /statuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Status::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $statuses = $query->get();

        return response()->json(StatusResource::collection($statuses));
    }

    /**
     * Store a newly created Status in storage.
     * POST /statuses
     *
     * @param CreateStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var Status $status */
        $status = Status::create($input);

        return response()->json(new StatusResource($status));
    }

    /**
     * Display the specified Status.
     * GET|HEAD /statuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Status $status */
        $status = Status::find($id);

        if (empty($status)) {
            return $this->sendError('Status not found');
        }

        return response()->json(new StatusResource($status));
    }

    /**
     * Update the specified Status in storage.
     * PUT/PATCH /statuses/{id}
     *
     * @param int $id
     * @param UpdateStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusAPIRequest $request)
    {
        /** @var Status $status */
        $status = Status::find($id);

        if (empty($status)) {
            return $this->sendError('Status not found');
        }

        $status->fill($request->all());
        $status->save();

        return response()->json(new StatusResource($status));
    }

    /**
     * Remove the specified Status from storage.
     * DELETE /statuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Status $status */
        $status = Status::find($id);

        if (empty($status)) {
            return $this->sendError('Status not found');
        }

        $status->delete();

        return response()->json('Status deleted successfully');
    }
}
