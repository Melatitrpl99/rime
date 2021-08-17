<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserVerificationRequest;
use App\Http\Requests\UpdateUserVerificationRequest;
use App\Http\Controllers\Controller;
use App\Models\UserVerification;
use Illuminate\Http\Request;

/**
 * Class UserVerificationController
 * @package App\Http\Controllers
 */
class UserVerificationController extends Controller
{
    /**
     * Display a listing of the UserVerification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $userVerifications = UserVerification::paginate(15);

        return view('admin.user_verifications.index')
            ->with('userVerifications', $userVerifications);
    }

    /**
     * Show the form for creating a new UserVerification.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.user_verifications.create');
    }

    /**
     * Store a newly created UserVerification in storage.
     *
     * @param \App\Http\Requests\CreateUserVerificationRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateUserVerificationRequest $request)
    {
        UserVerification::create($request->validated());

        flash('User Verification saved successfully.', 'success');

        return redirect()->route('admin.user_verifications.index');
    }

    /**
     * Display the specified UserVerification.
     *
     * @param \App\Models\UserVerification $userVerification
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(UserVerification $userVerification)
    {
        return view('admin.user_verifications.show')
            ->with('userVerification', $userVerification);
    }

    /**
     * Show the form for editing the specified UserVerification.
     *
     * @param \App\Models\UserVerification $userVerification
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(UserVerification $userVerification)
    {
        return view('admin.user_verifications.edit')
            ->with('userVerification', $userVerification);
    }

    /**
     * Update the specified UserVerification in storage.
     *
     * @param \App\Models\UserVerification $userVerification
     * @param \App\Http\Requests\UpdateUserVerificationRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(UserVerification $userVerification, UpdateUserVerificationRequest $request)
    {
        $userVerification->update($request->validated());

        flash('User Verification updated successfully.', 'success');

        return redirect()->route('admin.user_verifications.index');
    }

    /**
     * Remove the specified UserVerification from storage.
     *
     * @param \App\Models\UserVerification $userVerification
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(UserVerification $userVerification)
    {
        $userVerification->delete();

        flash('User Verification deleted successfully.', 'success');

        return redirect()->route('admin.user_verifications.index');
    }
}
