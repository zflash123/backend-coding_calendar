<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\event_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function user_duration()
    {
        if (Auth::user()) {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ODgwODBiZGItOTA0MC00Y2I0LWE2ZWEtOWEwZjVmMzc1YTdm'
            ])->get('https://wakatime.com/api/v1/users/current/durations', [
                'date' => '2022-06-25',
                'paywalled' => 'true',
            ]);
            return $response->json();
        }
    }

    public function project_duration($project_name)
    {
        if (Auth::user()) {
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

    public function create_event(Request $request)
    {
        if (Auth::user()) {
            $validator = Validator::make($request->all(), [
                'project_name' => ['required', 'string', 'max:255'],
                'date_event' => ['required', 'date'],
                'start_time_plan' => ['required', 'time'],
                'finish_time_plan' => ['required', 'time'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }
            $input = $request->all();
            $eventDetails = event_details::create($input);
            return response()->json([
                'success' => $eventDetails,
            ]);
        }
    }
}
