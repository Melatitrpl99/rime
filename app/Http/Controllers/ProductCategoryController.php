<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

/**
 * Class ProductCategoryController
 * @package App\Http\Controllers
 */
class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the ProductCategory.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::paginate(15);

        return view('admin.product_categories.index')
            ->with('productCategories', $productCategories);
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.product_categories.create');
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param \App\Http\Requests\CreateProductCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        ProductCategory::create($request->validated());

        flash('Product Category saved successfully.', 'success');

        return redirect()->route('admin.product_categories.index');
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param \App\Models\ProductCategory $productCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(ProductCategory $productCategory)
    {
        return view('admin.product_categories.show')
            ->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param \App\Models\ProductCategory $productCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_categories.edit')
            ->with('productCategory', $productCategory);
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param \App\Models\ProductCategory $productCategory
     * @param \App\Http\Requests\UpdateProductCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(ProductCategory $productCategory, UpdateProductCategoryRequest $request)
    {
        $productCategory->update($request->validated());

        flash('Product Category updated successfully.', 'success');

        return redirect()->route('admin.product_categories.index');
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param \App\Models\ProductCategory $productCategory
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        flash('Product Category deleted successfully.', 'success');

        return redirect()->route('admin.product_categories.index');
    }
}
