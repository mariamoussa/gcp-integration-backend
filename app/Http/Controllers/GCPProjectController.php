<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GCPProjectService;

class GCPProjectController extends Controller
{
    public function getProjectDetails(Request $request)
    {
        $projectId = $request->input('project_id');
        if (!$projectId) {
            return response()->json(['error' => 'Project ID is required'], 400);
        }

        try {
            $projectService = new GCPProjectService();
            $details = $projectService->fetchProjectDetails($projectId);
            return response()->json($details);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
