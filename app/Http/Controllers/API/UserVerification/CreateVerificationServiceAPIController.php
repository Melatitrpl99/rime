<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVerificationResource;
use Illuminate\Http\Request;

class CreateVerificationServiceAPIController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        if ($user->hasRole('reseller')) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $userVerification = $user->userVerification;
        if (!$userVerification) {
            $userVerification = $user->userVerification()->create([
                'verification_status_id' => 1,
            ]);
        }

        return response()->json(new UserVerificationResource($userVerification->load('verificationStatus')));
    }
}
