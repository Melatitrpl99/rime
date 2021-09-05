<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->unauthorized('Email atau password salah');
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function register(RegisterRequest $request)
    {
        $register = $request->validated();
        $register['password'] = Hash::make($register['password']);

        $login = $request->safe()->only(['email', 'password']);

        $user = User::create($register);
        $user->assignRole('customer');

        if (!$token = auth('api')->attempt($login)) {
            return response()->unauthorized('Email atau password salah');
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    public function me()
    {
        return response()->json(new UserResource(auth('api')
            ->user()
            ->load(['avatar', 'userShipments'])));
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function updateProfile(UpdateProfileAPIRequest $request)
    {
        auth('api')->user()->update($request->validated());

        return response()->json(new UserResource(auth('api')
            ->user()
            ->load(['avatar'])));
    }
}
