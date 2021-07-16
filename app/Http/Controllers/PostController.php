<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the Post.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $posts = Post::paginate(15);

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
     * @param \App\Http\Requests\CreatePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->validated());

        flash('Post saved successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified Post.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            flash('Post not found', 'error');

            return redirect()->route('admin.posts.index');
        }

        return view('admin.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            flash('Post not found', 'error');

            return redirect()->route('admin.posts.index');
        }

        return view('admin.posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdatePostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = Post::find($id);

        if (empty($post)) {
            flash('Post not found', 'error');

            return redirect()->route('admin.posts.index');
        }

        $post->update($request->validated());

        flash('Post updated successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            flash('Post not found', 'error');

            return redirect()->route('admin.posts.index');
        }

        $post->delete();

        flash('Post deleted successfully.', 'success');

        return redirect()->route('admin.posts.index');
    }
}