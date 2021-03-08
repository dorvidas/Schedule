<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        return [
            [
            'date' => 1,
            'timeFrom' => 1,
            'timeTo' => 4,
            'name' => 'Jonn'
            ],
            [
                'date' => 2,
                'timeFrom' => 2,
                'timeTo' => 4,
                'name' => 'Peter'
            ],
            [
                'date' => 1,
                'timeFrom' => 3,
                'timeTo' => 4,
                'name' => 'Sam'
            ],
        ];
    }
}
