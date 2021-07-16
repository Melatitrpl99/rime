<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

/**
 * Class PartnerController
 * @package App\Http\Controllers
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
     * @param \App\Http\Requests\CreatePartnerRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreatePartnerRequest $request)
    {
        $partner = Partner::create($request->validated());

        flash('Partner saved successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified Partner.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $partner = Partner::find($id);

        if (empty($partner)) {
            flash('Partner not found', 'error');

            return redirect()->route('admin.partners.index');
        }

        return view('admin.partners.show')
            ->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified Partner.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        if (empty($partner)) {
            flash('Partner not found', 'error');

            return redirect()->route('admin.partners.index');
        }

        return view('admin.partners.edit')
            ->with('partner', $partner);
    }

    /**
     * Update the specified Partner in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdatePartnerRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdatePartnerRequest $request)
    {
        $partner = Partner::find($id);

        if (empty($partner)) {
            flash('Partner not found', 'error');

            return redirect()->route('admin.partners.index');
        }

        $partner->update($request->validated());

        flash('Partner updated successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified Partner from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);

        if (empty($partner)) {
            flash('Partner not found', 'error');

            return redirect()->route('admin.partners.index');
        }

        $partner->delete();

        flash('Partner deleted successfully.', 'success');

        return redirect()->route('admin.partners.index');
    }
}