<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetupTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = env('SETUP_TOKEN');

        // If no token configured, only allow in local environment
        if (empty($token)) {
            if (app()->environment('local')) {
                return $next($request);
            }
            return response()->json(['error' => 'Setup route is disabled.'], 403);
        }

        // Require matching token
        if ($request->query('token') !== $token) {
            return response()->json(['error' => 'Invalid or missing setup token.'], 403);
        }

        return $next($request);
    }
}
