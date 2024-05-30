<?php

namespace App\Http\Controllers\api\v1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string'
        ], [
            'username.exists' => 'User tidak ditemukan',
            'username.required' => 'Silahkan isi field username terlebih dahulu',
            'username.string' => 'Field username harus berupa string',
            'password.required' => 'Silahkan isi field password terlebih dahulu',
            'password.string' => 'Field password harus berupa string',
        ]);

        $credentials = $request->only('username', 'password');        
        if(!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Username atau password salah'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token_kantorku')->plainTextToken;
        return response()->json([
            'message' => 'Login Berhasil',
            'access_token' => $token
        ]);
    }
}
