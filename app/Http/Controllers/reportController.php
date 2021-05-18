<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportController extends Controller
{
    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Report $reports */
        $reports = Report::all();

        return view('admin.reports.index')
            ->with('reports', $reports);
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {
        $input = $request->all();

        /** @var Report $report */
        $report = Report::create($input);

        Flash::success('Report saved successfully.');

        return redirect(route('admin.reports.index'));
    }

    /**
     * Display the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Report $report */
        $report = Report::find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        return view('admin.reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Report $report */
        $report = Report::find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        return view('admin.reports.edit')->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param int $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        /** @var Report $report */
        $report = Report::find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        $report->fill($request->all());
        $report->save();

        Flash::success('Report updated successfully.');

        return redirect(route('admin.reports.index'));
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Report $report */
        $report = Report::find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        $report->delete();

        Flash::success('Report deleted successfully.');

        return redirect(route('admin.reports.index'));
    }
}
