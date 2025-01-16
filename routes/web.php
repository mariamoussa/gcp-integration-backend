<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GCPProjectController;

// Test route
Route::get('/gcp/instances', function () {
    return response()->json(['message' => 'Route is working']);
});

// Fetch GCP project details
Route::get('/gcp/project', [GCPProjectController::class, 'getProjectDetails']);



Route::post('/project-details', [GCPProjectController::class, 'getProjectDetails']);
