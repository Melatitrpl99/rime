<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function login()
    {
       $credentials = request(['email', 'password']);
       if (! $token = auth('api')->attempt($credentials)) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }
       return $this->respondWithToken($token);

    }

    public function register(Request $request)
    {
        $input = $request->only(['name', 'email', 'password']);

        $rules = Validator::make([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ], $input);

        dd($rules);

        $user = User::create($rules);

        dd($user);

        if (! $token = auth('api')->attempt(['email' => $input['email'], 'password'=> $input['password']])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'acces_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() *60]);
    }
}
