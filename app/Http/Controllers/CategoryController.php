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
        $categories = Category::all();

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
        $category = Category::create($request->validated());

        flash('Category saved successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified Category.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            flash('Category not found', 'error');

            return redirect()->route('admin.categories.index');
        }

        return view('admin.categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            flash('Category not found', 'error');

            return redirect()->route('admin.categories.index');
        }

        return view('admin.categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = Category::find($id);

        if (empty($category)) {
            flash('Category not found', 'error');

            return redirect()->route('admin.categories.index');
        }

        $category->update($request->validated());

        flash('Category updated successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            flash('Category not found', 'error');

            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        flash('Category deleted successfully.', 'success');

        return redirect()->route('admin.categories.index');
    }
}