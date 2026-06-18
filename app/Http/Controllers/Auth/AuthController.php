<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // for users to login
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid Username or Password'], 422);
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
