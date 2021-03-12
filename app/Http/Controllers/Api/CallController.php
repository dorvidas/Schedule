<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use DateTime;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function manageCalls()
    {
        $schedules = Schedule::all();
        $time = new DateTime("now", new DateTimeZone('Europe/Vilnius'));
        $activeNumber = '';
        foreach ($schedules as $schedule)
        {
            if ($schedule->date == date("Y-m-d")
                && strtotime($schedule->starting_at) <= strtotime($time->format('H:i'))
                && strtotime($schedule->finishing_at) > strtotime($time->format('H:i'))
                && $schedule->user->busy === 0)
            {
                $activeNumber = $schedule->user->phone_number;
                $activeNumber = ltrim($activeNumber, '+');
                //set employer status to busy

                $numberToConnect = new \Vonage\Voice\Endpoint\Phone($activeNumber);
                $action = new \Vonage\Voice\NCCO\Action\Connect($numberToConnect);
                $action->setFrom('37052220525');

                $ncco = new \Vonage\Voice\NCCO\NCCO();
                $ncco->addAction($action);

                return new JsonResponse($ncco->toArray());
            }
            else{
                // VOICE ANSWER THAT ALL EMPLOYEES ARE BUSY 
            }
        }
        
    }
}
