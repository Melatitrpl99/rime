<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function login(LoginAPIRequest $request)
    {
        $credentials = $request->validated();

        $user = User::firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
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

        $user = User::create($register);
        $user->assignRole('customer');

        return response()->json([
            'access_token'  => $user->createToken($request->userAgent())->plainTextToken,
            'token_type'    => 'Bearer',
        ], 200);
    }

    public function logout()
    {
        $user = auth('sanctum')->user();
        $user->tokens()->whereToken($user->currentAccessToken()->token)->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
