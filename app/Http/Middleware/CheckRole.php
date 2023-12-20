<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if ($user && $user->role->description === $role) {
                return $next($request);
            }

            return response()->json(['error' => 'Acceso no autorizado'], 403);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token inválido'], 401);
        }
    }
}
