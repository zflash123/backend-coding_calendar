<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function index()
    {
        $response = Http::get('https://freegeoip.app/json/192.168.1.2');
        // $response = Http::get('https://wakatime.com/api/v1/users/current/durations?date=2022-06-01&paywalled=true');
        // return $response;
        return "{}";
    }
}
