<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingCategoryRequest;
use App\Http\Requests\UpdateSpendingCategoryRequest;
use App\Models\SpendingCategory;
use Illuminate\Http\Request;

/**
 * Class SpendingCategoryController.
 */
class SpendingCategoryController extends Controller
{
    /**
     * Display a listing of the SpendingCategory.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $spendingCategories = SpendingCategory::paginate(15);

        return view('admin.spending_categories.index')
            ->with('spendingCategories', $spendingCategories);
    }

    /**
     * Show the form for creating a new SpendingCategory.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.spending_categories.create');
    }

    /**
     * Store a newly created SpendingCategory in storage.
     *
     * @param \App\Http\Requests\StoreSpendingCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreSpendingCategoryRequest $request)
    {
        SpendingCategory::create($request->validated());

        flash('Spending Category saved successfully.', 'success');

        return redirect()->route('admin.spending_categories.index');
    }

    /**
     * Display the specified SpendingCategory.
     *
     * @param \App\Models\SpendingCategory $spendingCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(SpendingCategory $spendingCategory)
    {
        return view('admin.spending_categories.show')
            ->with('spendingCategory', $spendingCategory);
    }

    /**
     * Show the form for editing the specified SpendingCategory.
     *
     * @param \App\Models\SpendingCategory $spendingCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(SpendingCategory $spendingCategory)
    {
        return view('admin.spending_categories.edit')
            ->with('spendingCategory', $spendingCategory);
    }

    /**
     * Update the specified SpendingCategory in storage.
     *
     * @param \App\Models\SpendingCategory $spendingCategory
     * @param \App\Http\Requests\UpdateSpendingCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(SpendingCategory $spendingCategory, UpdateSpendingCategoryRequest $request)
    {
        $spendingCategory->update($request->validated());

        flash('Spending Category updated successfully.', 'success');

        return redirect()->route('admin.spending_categories.index');
    }

    /**
     * Remove the specified SpendingCategory from storage.
     *
     * @param \App\Models\SpendingCategory $spendingCategory
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(SpendingCategory $spendingCategory)
    {
        $spendingCategory->delete();

        flash('Spending Category deleted successfully.', 'success');

        return redirect()->route('admin.spending_categories.index');
    }
}
