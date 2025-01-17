<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GCPAuthController extends Controller
{
    // Exchange authorization code for access token
    public function exchangeToken(Request $request)
    {
        $code = $request->input('code');

        if (!$code) {
            return response()->json(['error' => 'Authorization code not provided'], 400);
        }

        try {
            $client = new Client();
            $response = $client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'code' => $code,
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                    'grant_type' => 'authorization_code',
                ],
            ]);

            $tokenData = json_decode($response->getBody(), true);

            return response()->json($tokenData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to exchange token', 'details' => $e->getMessage()], 500);
        }
    }

    // Fetch projects using access token
    public function fetchProjects(Request $request)
    {
        $accessToken = $request->header('Authorization');

        if (!$accessToken) {
            return response()->json(['error' => 'Access token not provided'], 400);
        }

        try {
            $client = new Client();
            $response = $client->get('https://cloudresourcemanager.googleapis.com/v1/projects', [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                ],
            ]);

            $projects = json_decode($response->getBody(), true);

            return response()->json($projects);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch projects', 'details' => $e->getMessage()], 500);
        }
    }
}
