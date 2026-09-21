<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // for register users
    public function Register(RegisterRequest $request)
    {
        $userData = $request->validated();

        $user = User::create($userData);

        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Account created successfully',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    // for users to login
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid Username or Password'], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successfully',
            'token' => $token,
            'user' => [
                'role' => $user->role,
                'id' => $user->id,
            ]
        ], 200); 
    }
}
