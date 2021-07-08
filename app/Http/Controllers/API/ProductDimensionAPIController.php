<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductDimensionAPIRequest;
use App\Http\Requests\API\UpdateProductDimensionAPIRequest;
use App\Models\ProductDimension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDimensionResource;
use Response;

/**
 * Class ProductDimensionController
 * @package App\Http\Controllers\API
 */

class ProductDimensionAPIController extends Controller
{
    /**
     * Display a listing of the ProductDimension.
     * GET|HEAD /productDimensions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ProductDimension::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $productDimensions = $query->get();

        return $this->sendResponse(ProductDimensionResource::collection($productDimensions), 'Product Dimensions retrieved successfully');
    }

    /**
     * Store a newly created ProductDimension in storage.
     * POST /productDimensions
     *
     * @param CreateProductDimensionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductDimensionAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::create($input);

        return $this->sendResponse(new ProductDimensionResource($productDimension), 'Product Dimension saved successfully');
    }

    /**
     * Display the specified ProductDimension.
     * GET|HEAD /productDimensions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            return $this->sendError('Product Dimension not found');
        }

        return $this->sendResponse(new ProductDimensionResource($productDimension), 'Product Dimension retrieved successfully');
    }

    /**
     * Update the specified ProductDimension in storage.
     * PUT/PATCH /productDimensions/{id}
     *
     * @param int $id
     * @param UpdateProductDimensionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductDimensionAPIRequest $request)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            return $this->sendError('Product Dimension not found');
        }

        $productDimension->fill($request->all());
        $productDimension->save();

        return $this->sendResponse(new ProductDimensionResource($productDimension), 'ProductDimension updated successfully');
    }

    /**
     * Remove the specified ProductDimension from storage.
     * DELETE /productDimensions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            return $this->sendError('Product Dimension not found');
        }

        $productDimension->delete();

        return $this->sendSuccess('Product Dimension deleted successfully');
    }
}
