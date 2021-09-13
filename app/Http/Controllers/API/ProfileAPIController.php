<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileAPIController extends Controller
{
    public function me()
    {
        return response()->json(new UserResource(auth('sanctum')
            ->user()
            ->load(['avatar', 'userShipments'])));
    }

    public function updateProfile(UpdateProfileAPIRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json(new UserResource(auth()
            ->user()
            ->load(['avatar'])));
    }

    public function uploadAvatar(Request $request)
    {
        //
    }
}
