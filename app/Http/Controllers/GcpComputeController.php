<?php

namespace App\Http\Controllers;

use App\Services\GCPComputeService;
use Illuminate\Support\Facades\Log;

class GcpComputeController extends Controller
{
    public function listInstances()
    {
        try {
            Log::info('listInstances method called.');
            $service = new GCPComputeService();
            $instances = $service->listInstances();

            Log::info('Instances retrieved: ', $instances);
            return response()->json($instances);
        } catch (\Exception $e) {
            Log::error('Error in listInstances: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
