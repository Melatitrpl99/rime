<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductStockAPIRequest;
use App\Http\Requests\API\UpdateProductStockAPIRequest;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductStockResource;
use Response;

/**
 * Class ProductStockController
 * @package App\Http\Controllers\API
 */

class ProductStockAPIController extends Controller
{
    /**
     * Display a listing of the ProductStock.
     * GET|HEAD /productStocks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ProductStock::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $productStocks = $query->get();

        return $this->sendResponse(ProductStockResource::collection($productStocks), 'Product Stocks retrieved successfully');
    }

    /**
     * Store a newly created ProductStock in storage.
     * POST /productStocks
     *
     * @param CreateProductStockAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductStockAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductStock $productStock */
        $productStock = ProductStock::create($input);

        return $this->sendResponse(new ProductStockResource($productStock), 'Product Stock saved successfully');
    }

    /**
     * Display the specified ProductStock.
     * GET|HEAD /productStocks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            return $this->sendError('Product Stock not found');
        }

        return $this->sendResponse(new ProductStockResource($productStock), 'Product Stock retrieved successfully');
    }

    /**
     * Update the specified ProductStock in storage.
     * PUT/PATCH /productStocks/{id}
     *
     * @param int $id
     * @param UpdateProductStockAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductStockAPIRequest $request)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            return $this->sendError('Product Stock not found');
        }

        $productStock->fill($request->all());
        $productStock->save();

        return $this->sendResponse(new ProductStockResource($productStock), 'ProductStock updated successfully');
    }

    /**
     * Remove the specified ProductStock from storage.
     * DELETE /productStocks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            return $this->sendError('Product Stock not found');
        }

        $productStock->delete();

        return $this->sendSuccess('Product Stock deleted successfully');
    }
}
