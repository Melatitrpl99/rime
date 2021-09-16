<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UpdateLoginAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileAPIController extends Controller
{
    public function me()
    {
        return response()->json(new UserResource(auth('sanctum')
            ->user()
            ->load(['avatar', 'defaultUserShipment'])));
    }

    public function updateProfile(UpdateProfileAPIRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json(new UserResource(auth()
            ->user()
            ->load(['avatar'])));
    }

    public function updateLogin(UpdateLoginAPIRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json(['message' => 'Login successfully updated']);
    }

    public function uploadAvatar(Request $request)
    {
        //
    }
}
