<?php

namespace App\Http\Controllers;

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
        foreach ($period as $currentDay) {
            $weekDays[] = $currentDay->format('l m-d');
        }

        $users = User::get();
        return view('dashboard', [
            'currentWeek' => $weekDays,
            'users' => $users,
        ]);
    }
    public function store(Request $request)
    {
        $request->user()->times()->create([
            'user_id' => User::find($request->user_id),
            'workDay' => $request->workDay,
            'StartingAt' => $request->StartingAt,
            'FinishingAt' => $request->FinishingAt 
        ]);
        return back();
    }
}
