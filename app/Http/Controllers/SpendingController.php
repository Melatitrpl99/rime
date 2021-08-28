<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingRequest;
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
        $spendings = Spending::with('spendingCategory')
            ->withSum('spendingDetails', 'jumlah')
            ->paginate(15);

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
     * @param \App\Http\Requests\StoreSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreSpendingRequest $request)
    {
        Spending::create($request->validated());

        flash('Spending saved successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Display the specified Spending.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Spending $spending)
    {
        return view('admin.spendings.show')
            ->with('spending', $spending);
    }

    /**
     * Show the form for editing the specified Spending.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Spending $spending)
    {
        return view('admin.spendings.edit')
            ->with('spending', $spending);
    }

    /**
     * Update the specified Spending in storage.
     *
     * @param \App\Models\Spending $spending
     * @param \App\Http\Requests\UpdateSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Spending $spending, UpdateSpendingRequest $request)
    {
        $spending->update($request->validated());

        flash('Spending updated successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Remove the specified Spending from storage.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Spending $spending)
    {
        $spending->delete();

        flash('Spending deleted successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }
}
