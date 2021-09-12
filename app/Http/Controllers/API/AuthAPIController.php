<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function login(LoginAPIRequest $request)
    {
        $credentials = $request->validated();

        $user = User::firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Email atau password salah']);
        }

        return response()->json([
            'access_token'  => $user->createToken($request->userAgent())->plainTextToken,
            'token_type'    => 'Bearer',
        ], 200);
    }

    public function register(RegisterAPIRequest $request)
    {
        $register = $request->validated();
        $register['password'] = Hash::make($register['password']);

        $credentials = $request->safe()->only(['email', 'password']);

        $user = User::create($register);
        $user->assignRole('customer');

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Email atau password salah']);
        }

        return response()->json([
            'access_token'  => $user->createToken($request->userAgent())->plainTextToken,
            'token_type'    => 'Bearer',
        ], 200);
    }

    public function me()
    {
        return response()->json(new UserResource(auth('api')
            ->user()
            ->load(['avatar', 'userShipments'])));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function updateProfile(UpdateProfileAPIRequest $request)
    {
        auth('api')->user()->update($request->validated());

        return response()->json(new UserResource(auth('api')
            ->user()
            ->load(['avatar'])));
    }
}
