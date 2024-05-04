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
            ->create("+261345114323", [
                "body" => "Vous avez un colis qui part de la poste",
                "from" => $sender
            ]);

        return redirect()->back()->with('success', 'SMS envoyé avec succès');
    }

    public function sendSmsArrived()
    {

        $sid = getenv('TWILIO_SID');
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new Client($sid, $token);


        $message = $twilio->messages
            ->create("+261345114323", [
                "body" => "Vous avez un colis qui est arrive a la poste",
                "from" => $sender
            ]);

        return redirect()->back()->with('success', 'SMS envoyé avec succès');
    }

    public function sendSMSRappel($status)
    {

        $sid = getenv('TWILIO_SID');
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new Client($sid, $token);
        if ($status === 0) {
            $message = $twilio->messages
                ->create("+261345114323", [
                    "body" => "Vous avez un colis qui est arrive a la poste mais vous ne l'avez pas recuperer",
                    "from" => $sender
                ]);
        } else {
            $message = $twilio->messages
                ->create("+261345114323", [
                    "body" => "Vous avez un colis qui est arrive a la poste est deja recuperer",
                    "from" => $sender
                ]);
        }



        return back()->with('success', 'Les SMS ont été envoyés pour rappeler la récupération du colis.');
    }
}
