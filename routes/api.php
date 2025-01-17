<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GCPAuthController;

Route::post('/gcp/exchange-token', [GCPAuthController::class, 'exchangeToken']);
Route::get('/gcp/projects', [GCPAuthController::class, 'fetchProjects'])->middleware('gcp.token');
