<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function user_duration() {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ZTRkMGI1YjctZGIxYy00ZDU0LTk4ZTUtZmE4ZmU0N2FiZWFi'
        ])->get('https://wakatime.com/api/v1/users/current/durations', [
            'date' => '2022-06-01',
            'paywalled' => 'true',
        ]);
        return $response;
    }
    
    public function project_duration($project_name) {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ZTRkMGI1YjctZGIxYy00ZDU0LTk4ZTUtZmE4ZmU0N2FiZWFi'
        ])->get('https://wakatime.com/api/v1/users/current/durations', [
            'date' => '2022-06-01',
            'paywalled' => 'true',
            'project' => $project_name,
        ]);
        return $response;
    }
}
