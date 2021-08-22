<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDimensionAPIRequest;
use App\Http\Requests\API\UpdateDimensionAPIRequest;
use App\Http\Resources\DimensionResource;
use App\Http\Controllers\Controller;
use App\Models\Dimension;
use Illuminate\Http\Request;

/**
 * Class DimensionAPIController
 * @package App\Http\Controllers\API
 */
class DimensionAPIController extends Controller
{
    /**
     * Display a listing of the Dimension.
     * GET|HEAD /dimensions
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
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

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => DimensionResource::collection($dimensions)
        ]);
    }


    /**
     * Display the specified Dimension.
     * GET|HEAD /dimensions/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new DimensionResource($dimension)
        ]);
    }
}