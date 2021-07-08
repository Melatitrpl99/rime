<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductColorAPIRequest;
use App\Http\Requests\API\UpdateProductColorAPIRequest;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductColorResource;
use Response;

/**
 * Class ProductColorController
 * @package App\Http\Controllers\API
 */

class ProductColorAPIController extends Controller
{
    /**
     * Display a listing of the ProductColor.
     * GET|HEAD /productColors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ProductColor::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $productColors = $query->get();

        return response()->json(ProductColorResource::collection($productColors));
    }

    /**
     * Store a newly created ProductColor in storage.
     * POST /productColors
     *
     * @param CreateProductColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductColor $productColor */
        $productColor = ProductColor::create($input);

        return response()->json(new ProductColorResource($productColor));
    }

    /**
     * Display the specified ProductColor.
     * GET|HEAD /productColors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            return $this->sendError('Product Color not found');
        }

        return response()->json(new ProductColorResource($productColor));
    }

    /**
     * Update the specified ProductColor in storage.
     * PUT/PATCH /productColors/{id}
     *
     * @param int $id
     * @param UpdateProductColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductColorAPIRequest $request)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            return $this->sendError('Product Color not found');
        }

        $productColor->fill($request->all());
        $productColor->save();

        return response()->json(new ProductColorResource($productColor));
    }

    /**
     * Remove the specified ProductColor from storage.
     * DELETE /productColors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            return $this->sendError('Product Color not found');
        }

        $productColor->delete();

        return response()->json('Product Color deleted successfully');
    }
}
