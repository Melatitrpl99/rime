<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostCategoryAPIRequest;
use App\Http\Requests\API\UpdatePostCategoryAPIRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCategoryResource;
use Response;

/**
 * Class PostCategoryController
 * @package App\Http\Controllers\API
 */

class PostCategoryAPIController extends Controller
{
    /**
     * Display a listing of the PostCategory.
     * GET|HEAD /postCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = PostCategory::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $postCategories = $query->get();

        return response()->json(PostCategoryResource::collection($postCategories));
    }

    /**
     * Store a newly created PostCategory in storage.
     * POST /postCategories
     *
     * @param CreatePostCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePostCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::create($input);

        return response()->json(new PostCategoryResource($postCategory));
    }

    /**
     * Display the specified PostCategory.
     * GET|HEAD /postCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::find($id);

        if (empty($postCategory)) {
            return $this->sendError('Post Category not found');
        }

        return response()->json($postCategory);
    }

    /**
     * Update the specified PostCategory in storage.
     * PUT/PATCH /postCategories/{id}
     *
     * @param int $id
     * @param UpdatePostCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostCategoryAPIRequest $request)
    {
        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::find($id);

        if (empty($postCategory)) {
            return $this->sendError('Post Category not found');
        }

        $postCategory->fill($request->all());
        $postCategory->save();

        return response()->json(new PostCategoryResource($postCategory));
    }

    /**
     * Remove the specified PostCategory from storage.
     * DELETE /postCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::find($id);

        if (empty($postCategory)) {
            return $this->sendError('Post Category not found');
        }

        $postCategory->delete();

        return response()->json('Post Category deleted successfully');
    }
}
