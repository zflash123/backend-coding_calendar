<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/durations', function () {
    $response = Http::withHeaders([
        'Authorization' => 'Basic ZTRkMGI1YjctZGIxYy00ZDU0LTk4ZTUtZmE4ZmU0N2FiZWFi'
    ])->get('https://wakatime.com/api/v1/users/current/durations', [
        'date' => '2022-06-01',
        'paywalled' => 'true',
        
    ]);
    return $response;
});
