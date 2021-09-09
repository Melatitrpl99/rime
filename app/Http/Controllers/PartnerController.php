<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

/**
 * Class PartnerController.
 */
class PartnerController extends Controller
{
    /**
     * Display a listing of the Partner.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $partners = Partner::paginate(15);

        return view('admin.partners.index')
            ->with('partners', $partners);
    }

    /**
     * Show the form for creating a new Partner.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created Partner in storage.
     *
     * @param \App\Http\Requests\StorePartnerRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StorePartnerRequest $request)
    {
        Partner::create($request->validated());

        flash('Partner saved successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified Partner.
     *
     * @param \App\Models\Partner $partner
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show')
            ->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified Partner.
     *
     * @param \App\Models\Partner $partner
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit')
            ->with('partner', $partner);
    }

    /**
     * Update the specified Partner in storage.
     *
     * @param \App\Models\Partner $partner
     * @param \App\Http\Requests\UpdatePartnerRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Partner $partner, UpdatePartnerRequest $request)
    {
        $partner->update($request->validated());

        flash('Partner updated successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified Partner from storage.
     *
     * @param \App\Models\Partner $partner
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        flash('Partner deleted successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }
}
