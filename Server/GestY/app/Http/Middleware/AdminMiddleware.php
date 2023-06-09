<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = env('ADMIN_API_TOKEN');

        if ($request->header('Authorization') !== $token) {
            return response()->json(['message' => 'Token inválido'], 401);
        }

        $response = $next($request);

        return $response;
    }
}
