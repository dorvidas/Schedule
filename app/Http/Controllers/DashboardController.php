<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $now = CarbonImmutable::now();
        $period = CarbonPeriod::create($now->startOfWeek()->format('Y-m-d'), 7);
        $weekDays = [];
        $inputDays = [];
        foreach ($period as $currentDay) {
            $inputDays[] = $currentDay->format('Y-m-d');
            $weekDays[] = $currentDay->format('l m-d');
        }

        $users = User::get();
        $schedule = Schedule::get();

        return view('dashboard', [
            'currentWeek' => $weekDays,
            'inputDays' => $inputDays,
            'users' => $users,
            'schedule' => $schedule
        ]);
    }
    public function store(Request $request)
    {   
       
        $request->user()->schedules()->create([
            'user_id' => $request->user_id,
            'date' => $request->inputDays,
            'starting_at' => $request->starting_at,
            'finishing_at' => $request->finishing_at 
        ]);
        
        return back();
    }
}
