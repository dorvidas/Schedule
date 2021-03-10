<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as ApiControllers;
use App\Models\Schedule;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schedules', [ApiControllers\ScheduleController::class, 'index']);

Route::get('/call', function() {
    $numberToConnect = new \Vonage\Voice\Endpoint\Phone('');
    
    $action = new \Vonage\Voice\NCCO\Action\Connect($numberToConnect);
    $action->setFrom('37052220525');

    $ncco = new \Vonage\Voice\NCCO\NCCO();
    $ncco->addAction($action);

    return new JsonResponse($ncco->toArray());
});

Route::get('/day', function(){
    $now = CarbonImmutable::now();
    $period = CarbonPeriod::create($now->startOfWeek()->format('Y-m-d'), 7);
    $inputDays = [];
    foreach ($period as $currentDay) {
        $inputDays[] = $currentDay->format('Y-m-d');
    }

        return  $inputDays;
});