<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

/**
 * Class PostController.
 */
class PostController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the Post.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $posts = Post::with(['postCategory', 'user'])->paginate(15);

        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        if ($request->has('path')) {
            $this->saveFile($request->input('path'), $request->judul, 'post', $post);
        }

        flash('Post saved successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified Post.
     *
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Post $post)
    {
        return view('admin.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Http\Requests\UpdatePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->validated());

        if ($request->filled('path')) {
            $this->saveFile($request->input('path'), $request->judul, 'post', $post);
        }

        flash('Post updated successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash('Post deleted successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }
}
