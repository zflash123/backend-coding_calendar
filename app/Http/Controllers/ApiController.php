<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function user_duration()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ODgwODBiZGItOTA0MC00Y2I0LWE2ZWEtOWEwZjVmMzc1YTdm'
        ])->get('https://wakatime.com/api/v1/users/current/durations', [
            'date' => '2022-06-25',
            'paywalled' => 'true',
        ]);
        return $response->json();
    }

    public function project_duration($project_name)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ODgwODBiZGItOTA0MC00Y2I0LWE2ZWEtOWEwZjVmMzc1YTdm'
        ])->get('https://wakatime.com/api/v1/users/current/durations', [
            'date' => '2022-06-25',
            'paywalled' => 'true',
            'project' => $project_name,
        ]);
        return $response->json();
    }
}
