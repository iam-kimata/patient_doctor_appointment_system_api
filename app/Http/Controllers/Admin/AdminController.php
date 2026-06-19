<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // for create users
    public function createUser(RegisterRequest $request)
    {
        $userData = $request->validated();

        $user = User::create($userData);

        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Account created successfully',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    // for displaying users
    public function users()
    {
        $users = User::whereIn('role', ['Patent', 'Doctor'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($users);    
    }

}
