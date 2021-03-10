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
                'date' => '2021-03-10',
                'timeFrom' => 2,
                'timeTo' => 4,
                'name' => 'Peter'
            ],
            [
                'date' => 6,
                'timeFrom' => 9,
                'timeTo' => 16,
                'name' => 'Sam'
            ],
        ];
    }
}
