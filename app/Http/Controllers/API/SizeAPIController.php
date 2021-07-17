<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSizeAPIRequest;
use App\Http\Requests\API\UpdateSizeAPIRequest;
use App\Http\Resources\SizeResource;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

/**
 * Class SizeAPIController
 * @package App\Http\Controllers\API
 */
class SizeAPIController extends Controller
{
    /**
     * Display a listing of the Size.
     * GET|HEAD /sizes
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
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

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => SizeResource::collection($sizes)
        ]);
    }

    /**
     * Store a newly created Size in storage.
     * POST /sizes
     *
     * @param \App\Http\Requests\CreateSizeRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateSizeAPIRequest $request)
    {
        $size = Size::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new SizeResource($size)
        ]);
    }

    /**
     * Display the specified Size.
     * GET|HEAD /sizes/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $size = Size::find($id);

        if (empty($size)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new SizeResource($size)
        ]);
    }

    /**
     * Update the specified Size in storage.
     * PUT/PATCH /sizes/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateSizeRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateSizeAPIRequest $request)
    {
        $size = Size::find($id);

        if (empty($size)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $size->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new SizeResource($size)
        ]);
    }

    /**
     * Remove the specified Size from storage.
     * DELETE /sizes/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);

        if (empty($size)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $size->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}