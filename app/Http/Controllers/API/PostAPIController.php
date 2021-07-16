<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostAPIRequest;
use App\Http\Requests\API\UpdatePostAPIRequest;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostAPIController
 * @package App\Http\Controllers\API
 */
class PostAPIController extends Controller
{
    /**
     * Display a listing of the Post.
     * GET|HEAD /posts
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $posts = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => PostResource::collection($posts)
        ]);
    }

    /**
     * Store a newly created Post in storage.
     * POST /posts
     *
     * @param \App\Http\Requests\CreatePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreatePostAPIRequest $request)
    {
        $post = Post::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new PostResource($post)
        ]);
    }

    /**
     * Display the specified Post.
     * GET|HEAD /posts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new PostResource($post)
        ]);
    }

    /**
     * Update the specified Post in storage.
     * PUT/PATCH /posts/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdatePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdatePostAPIRequest $request)
    {
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $post->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new PostResource($post)
        ]);
    }

    /**
     * Remove the specified Post from storage.
     * DELETE /posts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $post->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}