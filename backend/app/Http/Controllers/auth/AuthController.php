<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'Credenciales inválidas.',
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'No se pudo crear el token.',
            ], 500);
        }

        $admin = JWTAuth::user();
        if ($admin->role !== 'admin') {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'error' => 'No tienes permisos para acceder.',
            ], 403);
        }

        $rut = $admin->rut;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'token' => $token,
            'rut' => $rut,
        ], 200);
    }
}
