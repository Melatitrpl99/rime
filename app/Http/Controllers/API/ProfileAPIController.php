<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UpdateLoginAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Resources\FileResource;
use App\Http\Resources\UserResource;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

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
        if (!$request->has(['path'])) {
            return response()->json(['message' => 'unprocessable'], 422);
        }

        $user = auth()->user();
        $avatar = $user->avatar();
        if ($avatar->exists()) {
            $avatar->delete();
        }

        $file = $request->file('path');
        $format = $file->getClientOriginalExtension();

        $name = Str::slug($user->nama_lengkap);
        $fn = Str::random(16) . '.' . $format;

        $path = $file->storePubliclyAs('public/avatar', $fn);
        $path = Str::after($path, 'public/');
        $path = 'storage/' . $path;

        $f = new File();
        $f->fill([
            'name'      => $name,
            'mime_type' => $file->getMimeType(),
            'format'    => $format,
            'size'      => $file->getSize(),
            'path'      => $path,
            'url'       => asset($path),
        ]);

        $f->fileable()->associate($user);
        $f->save();

        return response()->json(new FileResource($f));
    }
}
