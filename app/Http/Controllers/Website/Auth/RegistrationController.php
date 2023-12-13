<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Website\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' =>$validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        
        ]);

        $token = $user->createToken('user', ['app:all']);

        return response()->json([
            'token' => $token->plainTextToken,
            // 'role' => $user->getRoleNames()[0],
            'success' => 'New account successfully created',
        ], 200);
    }
}
