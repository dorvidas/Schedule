<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;

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
        foreach ($period as $currentDay) {
            $weekDays[] = $currentDay->format('l m-d');
        }
        return view('dashboard', [
            'currentWeek' => $weekDays
        ]);
    }
}
