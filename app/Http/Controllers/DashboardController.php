<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $users = User::get();
        $schedule = Schedule::get();

        return view('dashboard', [
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
    public function addSchedule(Request $request)
    {   
        if ($request->isMethod('Post'))
        {  
            $request->user()->schedules()->create([
                'user_id' => (int)$request->user_id,
                'date' => $request->date,
                'starting_at' => $request->starting_at,
                'finishing_at' => $request->finishing_at,
            ]);
        }else{
            return back();
        }
    }
}
