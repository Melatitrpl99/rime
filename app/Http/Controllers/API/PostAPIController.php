<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostAPIRequest;
use App\Http\Requests\API\UpdatePostAPIRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Response;

/**
 * Class PostController
 * @package App\Http\Controllers\API
 */

class PostAPIController extends Controller
{
    /**
     * Display a listing of the Post.
     * GET|HEAD /posts
     *
     * @param Request $request
     * @return Response
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

        return response()->json(PostResource::collection($posts));
    }

    /**
     * Store a newly created Post in storage.
     * POST /posts
     *
     * @param CreatePostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePostAPIRequest $request)
    {
        $input = $request->all();

        /** @var Post $post */
        $post = Post::create($input);

        return response()->json(new PostResource($post));
    }

    /**
     * Display the specified Post.
     * GET|HEAD /posts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Post $post */
        $post = Post::find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        return response()->json($post);
    }

    /**
     * Update the specified Post in storage.
     * PUT/PATCH /posts/{id}
     *
     * @param int $id
     * @param UpdatePostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostAPIRequest $request)
    {
        /** @var Post $post */
        $post = Post::find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post->fill($request->all());
        $post->save();

        return response()->json(new PostResource($post));
    }

    /**
     * Remove the specified Post from storage.
     * DELETE /posts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Post $post */
        $post = Post::find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post->delete();

        return response()->json('Post deleted successfully');
    }
}
