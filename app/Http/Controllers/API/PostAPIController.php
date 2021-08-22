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

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

<<<<<<< Updated upstream
        $posts = $query->with('post_category')->get();

        return response()->json(PostResource::collection($posts), 200);
=======
        $posts = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => PostResource::collection($posts)
        ]);
>>>>>>> Stashed changes
    }

    /**
     * Display the specified Post.
     * GET|HEAD /posts/{$post}
     *
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Post $post)
    {
<<<<<<< Updated upstream
        return response()->json(new PostResource($post), 200);
    }
}
=======
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
}
>>>>>>> Stashed changes
