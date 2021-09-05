<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostAPIController.
 */
class PostAPIController extends Controller
{
    /**
     * Display a listing of the Post.
     * GET|HEAD /posts.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $posts = $query->with(['postCategory', 'image'])
            ->displayedOnFrontPage()
            ->get();

        return response()->json(PostResource::collection($posts), 200);
    }

    /**
     * Display the specified Post.
     * GET|HEAD /posts/{$post}.
     *
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Post $post)
    {
        $post->load(['postCategory', 'image']);

        return response()->json(new PostResource($post), 200);
    }
}
