<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * login method
     * 
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $credentials = $request->all(['email', 'password']);

        $token = auth('api')->attempt($credentials);
        
        if ($token) {
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['msg' => 'Usuário e/ou senha inválidos'], 403);
        }
    }

    /**
     * Logout method
     * 
     * @return Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout realizado com sucesso'], 200);
    }

    /**
     * Authorization refresh method
     * 
     * @return Illuminate\Http\JsonResponse
     */
    public function refresh() {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token], 200);
    }

    /**
     * Authorization method
     * 
     * @return Illuminate\Http\JsonResponse
     */
    public function me() {
        return response()->json(auth()->user(), 200);
    }
}
