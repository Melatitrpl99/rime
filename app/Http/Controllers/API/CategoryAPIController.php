<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoryAPIRequest;
use App\Http\Requests\API\UpdateCategoryAPIRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryAPIController
 * @package App\Http\Controllers\API
 */
class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the Category.
     * GET|HEAD /categories
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $categories = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => CategoryResource::collection($categories)
        ]);
    }

    /**
     * Store a newly created Category in storage.
     * POST /categories
     *
     * @param \App\Http\Requests\CreateCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateCategoryAPIRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new CategoryResource($category)
        ]);
    }

    /**
     * Display the specified Category.
     * GET|HEAD /categories/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new CategoryResource($category)
        ]);
    }

    /**
     * Update the specified Category in storage.
     * PUT/PATCH /categories/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateCategoryAPIRequest $request)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $category->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new CategoryResource($category)
        ]);
    }

    /**
     * Remove the specified Category from storage.
     * DELETE /categories/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $category->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}