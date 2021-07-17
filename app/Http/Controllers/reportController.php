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
        $report = Report::create($request->validated());

        flash('Report saved successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }

    /**
     * Display the specified Report.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $report = Report::find($id);

        if (empty($report)) {
            flash('Report not found', 'error');

            return redirect()->route('admin.reports.index');
        }

        return view('admin.reports.show')
            ->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $report = Report::find($id);
        if (empty($report)) {
            flash('Report not found', 'error');

            return redirect()->route('admin.reports.index');
        }

        return view('admin.reports.edit')
            ->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateReportRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = Report::find($id);

        if (empty($report)) {
            flash('Report not found', 'error');

            return redirect()->route('admin.reports.index');
        }

        $report->update($request->validated());

        flash('Report updated successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);

        if (empty($report)) {
            flash('Report not found', 'error');

            return redirect()->route('admin.reports.index');
        }

        $report->delete();

        flash('Report deleted successfully.', 'success');

        return redirect()->route('admin.reports.index');
    }
}