<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\Courrier;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSms()
    {
    
        $sid = getenv('TWILIO_SID');
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new Client($sid, $token);


        $message = $twilio->messages
            ->create("+261 32 65 025 62", [
                "body" => "Vous avez un colis qui part de la poste",
                "from" => $sender
            ]);

            return redirect()->back()->with('success', 'SMS envoyé avec succès');

    }
}
