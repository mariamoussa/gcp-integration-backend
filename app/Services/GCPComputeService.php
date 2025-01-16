<?php

namespace App\Services;

use Google\Cloud\Compute\V1\InstancesClient;
use Illuminate\Support\Facades\Log;

class GCPComputeService
{
    private $projectId;
    private $zone;

    public function __construct()
    {
        $this->projectId = env('GCP_PROJECT_ID', 'my-gcp-test-integration-maria');
        $this->zone = env('GCP_ZONE', 'europe-west1-b');
    }

    public function listInstances()
    {
        try {
            $instancesClient = new InstancesClient();
            $response = $instancesClient->list($this->projectId, $this->zone);

            $instances = [];
            foreach ($response->iterateAllElements() as $instance) {
                $instances[] = [
                    'id' => $instance->getId(),
                    'name' => $instance->getName(),
                    'status' => $instance->getStatus(),
                ];
            }

            return $instances;
        } catch (\Exception $e) {
            Log::error('Error listing instances: ' . $e->getMessage());
            throw $e;
        }
    }
}
