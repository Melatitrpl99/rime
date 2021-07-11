<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Flash;
use Response;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the PostCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PostCategory $postCategories */
        $postCategories = PostCategory::all();

        return view('admin.post_categories.index')
            ->with('postCategories', $postCategories);
    }

    /**
     * Show the form for creating a new PostCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.post_categories.create');
    }

    /**
     * Store a newly created PostCategory in storage.
     *
     * @param CreatePostCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatePostCategoryRequest $request)
    {
        $input = $request->all();

        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::create($input);

        Flash::success('Post Category saved successfully.');

        return redirect(route('admin.post_categories.index'));
    }

    /**
     * Display the specified PostCategory.
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
            Flash::error('Post Category not found');

            return redirect(route('admin.post_categories.index'));
        }

        return view('admin.post_categories.show')->with('postCategory', $postCategory);
    }

    /**
     * Show the form for editing the specified PostCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('admin.post_categories.index'));
        }

        return view('admin.post_categories.edit')->with('postCategory', $postCategory);
    }

    /**
     * Update the specified PostCategory in storage.
     *
     * @param int $id
     * @param UpdatePostCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostCategoryRequest $request)
    {
        /** @var PostCategory $postCategory */
        $postCategory = PostCategory::find($id);

        if (empty($postCategory)) {
            Flash::error('Post Category not found');

            return redirect(route('admin.post_categories.index'));
        }

        $postCategory->fill($request->all());
        $postCategory->save();

        Flash::success('Post Category updated successfully.');

        return redirect(route('admin.post_categories.index'));
    }

    /**
     * Remove the specified PostCategory from storage.
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
            Flash::error('Post Category not found');

            return redirect(route('admin.post_categories.index'));
        }

        $postCategory->delete();

        Flash::success('Post Category deleted successfully.');

        return redirect(route('admin.post_categories.index'));
    }
}
