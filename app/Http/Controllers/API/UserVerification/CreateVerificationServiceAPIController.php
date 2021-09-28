<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVerificationResource;
use Http;
use Illuminate\Http\Request;
use Str;

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
            $facenet = Http::post(env('KYC_URL') . '/api/facenet/create');

            if ($facenet->failed()) {
                return response()->json(['message' => 'unprocessable'], 422);
            }

            $response = json_decode($facenet->body());

            $userVerification = $user->userVerification()->create([
                'verification_status_id' => 1,
                'base_path'              => 'storage/verifications/' . Str::random(),
                'uuid'                   => $response->id,
            ]);
        }

        return response()->json(new UserVerificationResource($userVerification->load('verificationStatus')));
    }
}
