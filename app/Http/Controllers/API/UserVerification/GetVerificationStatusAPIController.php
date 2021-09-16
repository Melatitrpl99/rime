<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVerificationResource;
use Illuminate\Http\Request;

class GetVerificationStatusAPIController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        if ($user->hasRole('reseller')) {
            return response()->json(['message' => 'Anda telah terdaftar sebagai reseller.'], 200);
        }

        return response()->json(new UserVerificationResource($user->userVerification->load('verificationStatus')));
    }
}
