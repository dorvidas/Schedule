<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;

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

    public function sendMessages(Request $request, Client $client)
    {
        $number = '+37060552136';
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($number, 'Company', 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return back();
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
