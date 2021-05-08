<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;
use App\Repositories\SpendingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpendingController extends AppBaseController
{
    /** @var  SpendingRepository */
    private $spendingRepository;

    public function __construct(SpendingRepository $spendingRepo)
    {
        $this->spendingRepository = $spendingRepo;
    }

    /**
     * Display a listing of the Spending.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $spendings = $this->spendingRepository->all();

        return view('admin.spendings.index')
            ->with('spendings', $spendings);
    }

    /**
     * Show the form for creating a new Spending.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.spendings.create');
    }

    /**
     * Store a newly created Spending in storage.
     *
     * @param CreateSpendingRequest $request
     *
     * @return Response
     */
    public function store(CreateSpendingRequest $request)
    {
        $input = $request->all();

        $spending = $this->spendingRepository->create($input);

        Flash::success('Spending saved successfully.');

        return redirect(route('admin.spendings.index'));
    }

    /**
     * Display the specified Spending.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $spending = $this->spendingRepository->find($id);

        if (empty($spending)) {
            Flash::error('Spending not found');

            return redirect(route('admin.spendings.index'));
        }

        return view('admin.spendings.show')->with('spending', $spending);
    }

    /**
     * Show the form for editing the specified Spending.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $spending = $this->spendingRepository->find($id);

        if (empty($spending)) {
            Flash::error('Spending not found');

            return redirect(route('admin.spendings.index'));
        }

        return view('admin.spendings.edit')->with('spending', $spending);
    }

    /**
     * Update the specified Spending in storage.
     *
     * @param int $id
     * @param UpdateSpendingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpendingRequest $request)
    {
        $spending = $this->spendingRepository->find($id);

        if (empty($spending)) {
            Flash::error('Spending not found');

            return redirect(route('admin.spendings.index'));
        }

        $spending = $this->spendingRepository->update($request->all(), $id);

        Flash::success('Spending updated successfully.');

        return redirect(route('admin.spendings.index'));
    }

    /**
     * Remove the specified Spending from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $spending = $this->spendingRepository->find($id);

        if (empty($spending)) {
            Flash::error('Spending not found');

            return redirect(route('admin.spendings.index'));
        }

        $this->spendingRepository->delete($id);

        Flash::success('Spending deleted successfully.');

        return redirect(route('admin.spendings.index'));
    }
}
