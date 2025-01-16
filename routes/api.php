<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Token Generation Route
Route::post('/token', function (Request $request) {
    $apiKey = $request->input('apiKey');
    if ($apiKey !== env('FRONTEND_API_KEY')) {
        return response()->json(['error' => 'Invalid API key'], 401);
    }

    $payload = [
        'iss' => '127.0.0.1:8000',
        'iat' => time(),
        'exp' => time() + 3600,
        'sub' => 'frontend',
    ];

    $jwt = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    return response()->json(['token' => $jwt]);
});
