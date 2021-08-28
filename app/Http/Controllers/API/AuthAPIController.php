<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

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

        dd($register);

        $login = $request->safe()->only(['email', 'password']);

        $register['password'] = Hash::make($register['password']);

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
        $user = auth('api')
            ->user()
            ->load(['avatar', 'shipments']);

        return new UserResource($user);
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
}
