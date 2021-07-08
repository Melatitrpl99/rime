<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductSizeAPIRequest;
use App\Http\Requests\API\UpdateProductSizeAPIRequest;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductSizeResource;
use Response;

/**
 * Class ProductSizeController
 * @package App\Http\Controllers\API
 */

class ProductSizeAPIController extends Controller
{
    /**
     * Display a listing of the ProductSize.
     * GET|HEAD /productSizes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ProductSize::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $productSizes = $query->get();

        return response()->json(ProductSizeResource::collection($productSizes));
    }

    /**
     * Store a newly created ProductSize in storage.
     * POST /productSizes
     *
     * @param CreateProductSizeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSizeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductSize $productSize */
        $productSize = ProductSize::create($input);

        return response()->json(new ProductSizeResource($productSize));
    }

    /**
     * Display the specified ProductSize.
     * GET|HEAD /productSizes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            return $this->sendError('Product Size not found');
        }

        return response()->json(new ProductSizeResource($productSize));
    }

    /**
     * Update the specified ProductSize in storage.
     * PUT/PATCH /productSizes/{id}
     *
     * @param int $id
     * @param UpdateProductSizeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSizeAPIRequest $request)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            return $this->sendError('Product Size not found');
        }

        $productSize->fill($request->all());
        $productSize->save();

        return response()->json(new ProductSizeResource($productSize));
    }

    /**
     * Remove the specified ProductSize from storage.
     * DELETE /productSizes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            return $this->sendError('Product Size not found');
        }

        $productSize->delete();

        return response()->json('Product Size deleted successfully');
    }
}
