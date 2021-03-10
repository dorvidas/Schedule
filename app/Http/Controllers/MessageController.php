<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Vonage\Client;
use Vonage\SMS\Message\SMS;

class MessageController extends Controller
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->middleware(['auth']);

        $this->client = $client;
    }
    public function index()
    {
        return view('messages');
    }

    public function sendMessages()
    {
        $number = '+37060552136';
        $response = $this->client->sms()->send(
            new SMS($number, 'Company', 'A text message sent using the Nexmo SMS API')
        );
        
        $message = $response->current();

        if ($message->getStatus() == 0) {
            return back();
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        }
}
