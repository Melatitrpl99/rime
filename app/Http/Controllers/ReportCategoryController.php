<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportCategoryRequest;
use App\Http\Requests\UpdateReportCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ReportCategory;
use Illuminate\Http\Request;

/**
 * Class ReportCategoryController
 * @package App\Http\Controllers
 */
class ReportCategoryController extends Controller
{
    /**
     * Display a listing of the ReportCategory.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $reportCategories = ReportCategory::all();

        return view('admin.report_categories.index')
            ->with('reportCategories', $reportCategories);
    }

    /**
     * Show the form for creating a new ReportCategory.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.report_categories.create');
    }

    /**
     * Store a newly created ReportCategory in storage.
     *
     * @param \App\Http\Requests\StoreReportCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreReportCategoryRequest $request)
    {
        ReportCategory::create($request->validated());

        flash('Report Category saved successfully.', 'success');

        return redirect()->route('admin.report_categories.index');
    }

    /**
     * Display the specified ReportCategory.
     *
     * @param \App\Models\ReportCategory $reportCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(ReportCategory $reportCategory)
    {
        return view('admin.report_categories.show')
            ->with('reportCategory', $reportCategory);
    }

    /**
     * Show the form for editing the specified ReportCategory.
     *
     * @param \App\Models\ReportCategory $reportCategory
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(ReportCategory $reportCategory)
    {
        return view('admin.report_categories.edit')
            ->with('reportCategory', $reportCategory);
    }

    /**
     * Update the specified ReportCategory in storage.
     *
     * @param \App\Models\ReportCategory $reportCategory
     * @param \App\Http\Requests\UpdateReportCategoryRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(ReportCategory $reportCategory, UpdateReportCategoryRequest $request)
    {
        $reportCategory->update($request->validated());

        flash('Report Category updated successfully.', 'success');

        return redirect()->route('admin.report_categories.index');
    }

    /**
     * Remove the specified ReportCategory from storage.
     *
     * @param \App\Models\ReportCategory $reportCategory
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(ReportCategory $reportCategory)
    {
        $reportCategory->delete();

        flash('Report Category deleted successfully.', 'success');

        return redirect()->route('admin.report_categories.index');
    }
}
