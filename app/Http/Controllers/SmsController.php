<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Artisan;
use App\Models\Tasks;

class SmsController extends Controller
{
    public function sendDelayedSms($taskId)
    {   
        // Artisan::call('sms:send-delayed');
        // return 'Delayed SMS sent successfully.';
        $task = Tasks::find($taskId);
        $messageAdd = $task->description;

        $twilioSid = getenv('TWILIO_SID');
        $twilioToken = getenv('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new Client($twilioSid, $twilioToken);

        $recipientPhoneNumber = '+37067337302';

        $message = 'Hello, reminding that your task for today is ' . $messageAdd;

        $twilio->messages->create(
            $recipientPhoneNumber,
            [
                'from' => $twilioPhoneNumber,
                'body' => $message,
            ]
        );

        return redirect()->route('todo-list.index');
    }
}
