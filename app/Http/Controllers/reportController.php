<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /**
     * Display a listing of the Report.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $reports = Report::paginate(15);

        return view('admin.reports.index')
            ->with('reports', $reports);
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param \App\Http\Requests\CreateReportRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateReportRequest $request)
    {
        Report::create($request->validated());

        flash('Report saved successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }

    /**
     * Display the specified Report.
     *
     * @param \App\Models\Report $report
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Report $report)
    {
        return view('admin.reports.show')
            ->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param \App\Models\Report $report
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit')
            ->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param \App\Models\Report $report
     * @param \App\Http\Requests\UpdateReportRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Report $report, UpdateReportRequest $request)
    {
        $report->update($request->validated());

        flash('Report updated successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param \App\Models\Report $report
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        flash('Report deleted successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }
}
