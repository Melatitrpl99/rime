<?php

namespace App\Http\Controllers;

use App\Models\VerificationStatus;
use Illuminate\Http\Request;

class VerificationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.verification_statuses.index')
            ->with('verificationStatuses', VerificationStatus::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.verification_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VerificationStatus::create($request->name);

        flash('Verification status created successfully', 'success');

        return redirect()->route('admin.verification_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerificationStatus  $verificationStatus
     * @return \Illuminate\Http\Response
     */
    public function show(VerificationStatus $verificationStatus)
    {
        return view('admin.verification_statuses.show', compact('verificationStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerificationStatus  $verificationStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(VerificationStatus $verificationStatus)
    {
        return view('admin.verification_statuses.edit', compact('verificationStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VerificationStatus  $verificationStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VerificationStatus $verificationStatus)
    {
        $verificationStatus->update(['name' => $request->name]);

        flash('Verification Status updated successfully', 'success');

        return redirect()->route('admin.verification_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerificationStatus  $verificationStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerificationStatus $verificationStatus)
    {
        $verificationStatus->delete();

        flash('Verification Status deleted successfully', 'success');

        return redirect()->route('admin.verification_statuses.index');
    }
}
