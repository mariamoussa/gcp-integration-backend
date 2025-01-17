<?php

namespace App\Http\Middleware;

use Closure;

class ValidateGCPAccessToken
{
    public function handle($request, Closure $next)
    {
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Missing Authorization header'], 400);
        }

        return $next($request);
    }
}
