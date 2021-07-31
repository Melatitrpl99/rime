<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the Category.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(15);

        return view('admin.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param \App\Http\Requests\CreateCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->validated());

        flash('Category saved successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified Category.
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param \App\Models\Category $category
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $category->update($request->validated());

        flash('Category updated successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        flash('Category deleted successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }
}
