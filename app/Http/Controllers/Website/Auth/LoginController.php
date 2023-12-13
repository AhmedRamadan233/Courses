<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $user->tokens()->delete();
            $token = $user->createToken(request()->userAgent());
            return response()->json([
                'token' => $token->plainTextToken,
                // 'role' => $user->getRoleNames()[0],
                'success' => "Login successful",
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function logout()
{
    if (Auth::check()) {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful']);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
    
}
