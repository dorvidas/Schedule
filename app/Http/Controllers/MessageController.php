<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('messages');
    }

    public function sendMessages(Request $request)
    {
        require_once join(DIRECTORY_SEPARATOR, array('..', 'vendor', 'laravel', "framework", "src", "Illuminate", "Support", "Facades", 'Config.php'));
        require_once join(DIRECTORY_SEPARATOR, array('..', 'vendor', 'autoload.php'));
        $number = env('VONAGE_API_PHONE');
        $basic  = new \Vonage\Client\Credentials\Basic(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($number, 'Company', 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            return view('messages');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
