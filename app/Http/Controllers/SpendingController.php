<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;
use App\Http\Controllers\Controller;
use App\Models\Spending;
use Illuminate\Http\Request;

/**
 * Class SpendingController
 * @package App\Http\Controllers
 */
class SpendingController extends Controller
{
    /**
     * Display a listing of the Spending.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $spendings = Spending::paginate(15);

        return view('admin.spendings.index')
            ->with('spendings', $spendings);
    }

    /**
     * Show the form for creating a new Spending.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.spendings.create');
    }

    /**
     * Store a newly created Spending in storage.
     *
     * @param \App\Http\Requests\CreateSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateSpendingRequest $request)
    {
        $spending = Spending::create($request->validated());

        flash('Spending saved successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Display the specified Spending.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $spending = Spending::find($id);

        if (empty($spending)) {
            flash('Spending not found', 'error');

            return redirect()->route('admin.spendings.index');
        }

        return view('admin.spendings.show')
            ->with('spending', $spending);
    }

    /**
     * Show the form for editing the specified Spending.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $spending = Spending::find($id);
        if (empty($spending)) {
            flash('Spending not found', 'error');

            return redirect()->route('admin.spendings.index');
        }

        return view('admin.spendings.edit')
            ->with('spending', $spending);
    }

    /**
     * Update the specified Spending in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateSpendingRequest $request)
    {
        $spending = Spending::find($id);

        if (empty($spending)) {
            flash('Spending not found', 'error');

            return redirect()->route('admin.spendings.index');
        }

        $spending->update($request->validated());

        flash('Spending updated successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Remove the specified Spending from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $spending = Spending::find($id);

        if (empty($spending)) {
            flash('Spending not found', 'error');

            return redirect()->route('admin.spendings.index');
        }

        $spending->delete();

        flash('Spending deleted successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }
}