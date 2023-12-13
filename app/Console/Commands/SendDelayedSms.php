<?php

namespace App\Console\Commands;

use App\Models\Tasks;
use Illuminate\Console\Command;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class SendDelayedSms extends Command
{
    protected $signature = 'sms:send-delayed';
    protected $description = 'Send a delayed SMS';

    public function handle()
    {

        $twilioSid = getenv('TWILIO_SID');
        $twilioToken = getenv('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new Client($twilioSid, $twilioToken);

        $recipientPhoneNumber = '+37067337302';

        $message = 'Hello, this is a delayed SMS!';

        $twilio->messages->create(
            $recipientPhoneNumber,
            [
                'from' => $twilioPhoneNumber,
                'body' => $message,
            ]
        );

        $this->info('SMS sent successfully!');
    }
}
