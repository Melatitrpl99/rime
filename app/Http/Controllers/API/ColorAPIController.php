<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateColorAPIRequest;
use App\Http\Requests\API\UpdateColorAPIRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use Response;

/**
 * Class ColorController
 * @package App\Http\Controllers\API
 */

class ColorAPIController extends Controller
{
    /**
     * Display a listing of the Color.
     * GET|HEAD /colors
     *
     * @param Request $request
     * @return Response
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

        return response()->json(ColorResource::collection($colors));
    }

    /**
     * Store a newly created Color in storage.
     * POST /colors
     *
     * @param CreateColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Color $color */
        $color = Color::create($input);

        return response()->json(new ColorResource($color));
    }

    /**
     * Display the specified Color.
     * GET|HEAD /colors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            return $this->sendError('Product Color not found');
        }

        return response()->json(new ColorResource($color));
    }

    /**
     * Update the specified Color in storage.
     * PUT/PATCH /colors/{id}
     *
     * @param int $id
     * @param UpdateColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorAPIRequest $request)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            return $this->sendError('Product Color not found');
        }

        $color->fill($request->all());
        $color->save();

        return response()->json(new ColorResource($color));
    }

    /**
     * Remove the specified Color from storage.
     * DELETE /colors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            return $this->sendError('Product Color not found');
        }

        $color->delete();

        return response()->json('Product Color deleted successfully');
    }
}
