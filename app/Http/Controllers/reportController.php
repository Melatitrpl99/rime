<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reports = $this->reportRepository->all();

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

        $report = $this->reportRepository->create($input);

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
        $report = $this->reportRepository->find($id);

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
        $report = $this->reportRepository->find($id);

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
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        $report = $this->reportRepository->update($request->all(), $id);

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
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('admin.reports.index'));
        }

        $this->reportRepository->delete($id);

        Flash::success('Report deleted successfully.');

        return redirect(route('admin.reports.index'));
    }
}
