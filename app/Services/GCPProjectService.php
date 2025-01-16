<?php

namespace App\Services;

use Google\Cloud\ResourceManager\V3\Client\ProjectsClient;
use Google\Cloud\ResourceManager\V3\GetProjectRequest;

class GCPProjectService
{
    public function fetchProjectDetails($projectId)
    {
        $client = new ProjectsClient();

        $request = new GetProjectRequest();
        $request->setName('projects/' . $projectId);

        $project = $client->getProject($request);

        return [
            'name' => $project->getDisplayName(),
            'id' => $project->getProjectId(),
            'state' => $project->getState(),
        ];
    }
}
