<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use Http;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class StartVerificationServiceAPIController extends Controller
{
    public function __invoke()
    {
        $userVerification = auth()->user()->userVerification;

        if ($userVerification)

            $response = Http::asForm()->post(env('KYC_URL') . '/api/facenet/verify', [
                'face_path' => env('APP_URL') . '/' .  $userVerification->face_path,
                'idcard_path' => env('APP_URL') . '/' . $userVerification->idcard_path,
            ]);



        return json_decode($response->body());
    }
}
