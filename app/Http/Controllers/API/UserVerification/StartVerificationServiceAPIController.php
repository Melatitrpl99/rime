<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVerificationResource;
use Http;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class StartVerificationServiceAPIController extends Controller
{
    public function __invoke()
    {
        $userVerification = auth()->user()->userVerification;

        if (!$userVerification) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $response = Http::asForm()->post(env('KYC_URL') . '/api/facenet/verify', [
            'uuid' => $userVerification->uuid,
            'face_path' => env('APP_URL') . '/' .  $userVerification->face_path,
            'idcard_path' => env('APP_URL') . '/' . $userVerification->id_card_path,
        ]);

        if ($response->failed()) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $response = json_decode($response);

        if ($response->status == 'verified') {
            $userVerification->update([
                'result' => $response->distance,
                'similarity' => $response->similarity,
                'verification_status_id' => 3,
            ]);

            auth()->user()->assignRole('reseller');
            auth()->user()->removeRole('customer');
        }

        return response()->json(new UserVerificationResource($userVerification), 200);
    }
}
