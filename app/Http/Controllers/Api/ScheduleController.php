<?php

namespace App\Http\Controllers\Api;

use App\Models\Schedule;
use App\Models\User;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Routing\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        $scheduleArray = [];
        foreach ($schedules as $schedule)
        {
            $scheduleArray[] = [
                'date' => $schedule->date,
                'timeFrom' => $schedule->starting_at,
                'timeTo' => $schedule->finishing_at,
                'name' => $schedule->user->name
            ];
        }
        return $scheduleArray;
    }
    public function returnEmployees(){
        $users = User::all();
        return $users;
    }
    public function generateDays(){
        $now = CarbonImmutable::now();
        $period = CarbonPeriod::create($now->startOfWeek()->format('Y-m-d'), 7);
        $inputDays = [];
        foreach ($period as $currentDay) {
            $inputDays[] = $currentDay->format('Y-m-d');
        }
        return  $inputDays;
    }
}
