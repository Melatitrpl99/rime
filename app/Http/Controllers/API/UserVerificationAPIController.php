<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserVerificationAPIRequest;
use App\Http\Requests\API\UpdateUserVerificationAPIRequest;
use App\Http\Resources\UserVerificationResource;
use App\Http\Controllers\Controller;
use App\Models\UserVerification;
use Illuminate\Http\Request;

/**
 * Class UserVerificationAPIController
 * @package App\Http\Controllers\API
 */
class UserVerificationAPIController extends Controller
{
    /**
     * Display a listing of the UserVerification.
     * GET|HEAD /user_verifications
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = UserVerification::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $userVerifications = $query->get();

        return response()->json(UserVerificationResource::collection($userVerifications), 200);
    }

    /**
     * Store a newly created UserVerification in storage.
     * POST /user_verifications
     *
     * @param \App\Http\Requests\CreateUserVerificationRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateUserVerificationAPIRequest $request)
    {
        $userVerification = UserVerification::create($request->validated());

        return response()->json(new UserVerificationResource($userVerification), 201);
    }

    /**
     * Display the specified UserVerification.
     * GET|HEAD /user_verifications/{userVerification}
     *
     * @param \App\Models\UserVerification $userVerification
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(UserVerification $userVerification)
    {
        return response()->json(new UserVerificationResource($userVerification), 200);
    }

    /**
     * Update the specified UserVerification in storage.
     * PUT/PATCH /user_verifications/{userVerification}
     *
     * @param \App\Models\UserVerification $userVerification
     * @param \App\Http\Requests\UpdateUserVerificationRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(UserVerification $userVerification, UpdateUserVerificationAPIRequest $request)
    {
        $userVerification->update($request->validated());

        return response()->json(new UserVerificationResource($userVerification), 200);
    }

    /**
     * Remove the specified UserVerification from storage.
     * DELETE /user_verifications/{userVerification}
     *
     * @param \App\Models\UserVerification $userVerification
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(UserVerification $userVerification)
    {
        $userVerification->delete();

        return response()->json(null, 204);
    }
}
