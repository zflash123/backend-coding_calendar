<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\event_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function project_duration($yangDicari)
    {
        $user = Auth::user();
        if ($user) {
            $data = Http::withHeaders([
                'Authorization' => 'Basic '.base64_encode($user->wakatime_api)
            ])->get('https://wakatime.com/api/v1/users/current/summaries', [
                'start' => '2022-06-26',
                'end' => '2022-06-26',
                'cache' => 'true',
                'paywalled' => 'true',

            ]);
            $data = json_decode($data);
            $projects = $data->data[0]->projects;
            foreach($projects as $project){
                if($project->name==$yangDicari){
                    return $project->total_seconds;
                }
            }
            return print_r($data->data[0]->projects);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    // public function project_duration($project_name)
    // {
    //     if (Auth::user()) {
    //         $user = Auth::user();
    //         // $api = $user->wakatime_api;
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Basic '.base64_encode($user->wakatime_api)
    //         ])->get('https://wakatime.com/api/v1/users/current/durations', [
    //             'date' => '2022-06-25',
    //             'paywalled' => 'true',
    //             'project' => $project_name,
    //         ]);
    //         return $response->json();
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //         ]);
    //     }
    // }

    public function create_event(Request $request)
    {
        if (Auth::user()) {
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            } else {
                $validator = Validator::make($request->all(), [
                    'project_name' => ['required', 'string', 'max:255'],
                    'date_event' => ['required', 'date'],
                    'start_time_plan' => ['required'],
                    'finish_time_plan' => ['required'],
                    'start_wakatime' => [''],
                ]);
                $input = $request->all();
                // $input['start_wakatime'] = $this->project_duration($input['project_name']);
                dump($this->project_duration($input['project_name']));
                event_details::create($input);
                return response()->json([
                    'success' => true,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
