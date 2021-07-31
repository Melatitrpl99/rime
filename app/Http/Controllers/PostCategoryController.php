<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

/**
 * Class PostCategoryController
 * @package App\Http\Controllers
 */
class PostCategoryController extends Controller
{
    /**
     * Display a listing of the PostCategory.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $postCategories = PostCategory::paginate(15);

        return view('admin.post_categories.index')
            ->with('postCategories', $postCategories);
    }

    /**
     * Show the form for creating a new PostCategory.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.post_categories.create');
    }

    /**
     * Store a newly created PostCategory in storage.
     *
     * @param \App\Http\Requests\CreatePostCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreatePostCategoryRequest $request)
    {
        PostCategory::create($request->validated());

        flash('Post Category saved successfully.', 'success');

        return redirect()->route('admin.post_categories.index');
    }

    /**
     * Display the specified PostCategory.
     *
     * @param \App\Models\PostCategory $postCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(PostCategory $postCategory)
    {
        return view('admin.post_categories.show')
            ->with('postCategory', $postCategory);
    }

    /**
     * Show the form for editing the specified PostCategory.
     *
     * @param \App\Models\PostCategory $postCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(PostCategory $postCategory)
    {
        return view('admin.post_categories.edit')
            ->with('postCategory', $postCategory);
    }

    /**
     * Update the specified PostCategory in storage.
     *
     * @param \App\Models\PostCategory $postCategory
     * @param \App\Http\Requests\UpdatePostCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(PostCategory $postCategory, UpdatePostCategoryRequest $request)
    {
        $postCategory->update($request->validated());

        flash('Post Category updated successfully.', 'success');

        return redirect()->route('admin.post_categories.index');
    }

    /**
     * Remove the specified PostCategory from storage.
     *
     * @param \App\Models\PostCategory $postCategory
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        flash('Post Category deleted successfully.', 'success');

        return redirect()->route('admin.post_categories.index');
    }
}
