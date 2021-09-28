<?php

namespace App\Http\Controllers\API\UserVerification;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVerificationResource;
use App\Models\UserVerification;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Str;

class UploadImageAPIController extends Controller
{
    use FileUpload;

    public function __invoke(Request $request)
    {
        if (!$request->has(['image_type', 'path']) || $request->image_type > 2 || $request->image_type < 0) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $userVerification = auth()->user()->userVerification;

        if (!$userVerification) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $file = $request->file('path');
        $format = $file->getClientOriginalExtension();

        $name = $request->image_type == 1
            ? '0001.' . $format
            : '0002.' . $format;

        $basePath = Str::after($userVerification->base_path, 'storage/');

        $file->storePubliclyAs('public/' . $basePath, $name);

        if ($request->image_type == 1) {
            $userVerification->face_path = $name;
        }

        if ($request->image_type == 2) {
            $userVerification->id_card_path = $name;
        }

        $userVerification->save();

        return response()->json(new UserVerificationResource($userVerification->load('verificationStatus')));
    }
}
