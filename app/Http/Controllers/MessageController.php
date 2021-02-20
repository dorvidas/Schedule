<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class MessageController extends Controller
{
    public function index()
    {
        return view('messages');
    }

    public function sendMessages(Request $request)
    {
        require_once 'C:\Users\Audrius\EmployeeSchedule\Schedule\vendor\laravel\framework\src\Illuminate\Support\Facades\config.php';
        require_once 'C:\Users\Audrius\EmployeeSchedule\Schedule\vendor\autoload.php';
        
        $basic  = new \Vonage\Client\Credentials\Basic("VONAGE_API_KEY", "VONAGE_API_SECRET");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS('My_Phone_Nr', 'Company', 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            return view('messages');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
