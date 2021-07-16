<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateColorAPIRequest;
use App\Http\Requests\API\UpdateColorAPIRequest;
use App\Http\Resources\ColorResource;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class ColorAPIController
 * @package App\Http\Controllers\API
 */
class ColorAPIController extends Controller
{
    /**
     * Display a listing of the Color.
     * GET|HEAD /colors
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Color::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $colors = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => ColorResource::collection($colors)
        ]);
    }

    /**
     * Store a newly created Color in storage.
     * POST /colors
     *
     * @param \App\Http\Requests\CreateColorRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateColorAPIRequest $request)
    {
        $color = Color::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new ColorResource($color)
        ]);
    }

    /**
     * Display the specified Color.
     * GET|HEAD /colors/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $color = Color::find($id);

        if (empty($color)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new ColorResource($color)
        ]);
    }

    /**
     * Update the specified Color in storage.
     * PUT/PATCH /colors/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateColorRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateColorAPIRequest $request)
    {
        $color = Color::find($id);

        if (empty($color)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $color->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new ColorResource($color)
        ]);
    }

    /**
     * Remove the specified Color from storage.
     * DELETE /colors/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);

        if (empty($color)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $color->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}