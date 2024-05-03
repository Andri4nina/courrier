<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\Courrier;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSms($id)
    {
        // Récupérer le courrier
        $courrier = Courrier::findOrFail($id);

        // Initialiser Twilio client
        $twilioClient = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        // Numéro de téléphone de l'expéditeur
        /*      $telExp = '+261' . substr($courrier->exp->tel, 1); */
        $telExp = "+261326502562";
        // Numéro de téléphone du destinataire
        $telDest = '+261' . substr($courrier->dest->tel, 1);

        try {
            // Envoyer le SMS à l'expéditeur
            $twilioClient->messages->create(
                $telExp,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),
                    'body' => 'Votre colis va décoller de notre poste'
                ]
            );

            // Envoyer le SMS au destinataire
            /*    $twilioClient->messages->create(
                $telDest,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),
                    'body' => 'Vous avez un colis que vous pourrez récupérer dans votre poste. Vous serez informé lorsque le colis arrivera dans votre région.'
                ]
            ); */

            // Redirection avec un message de succès
            return redirect()->back()->with('success', 'SMS envoyé avec succès');
        } catch (\Exception $e) {
            // Gérer les erreurs d'envoi de SMS
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi du SMS : ' . $e->getMessage());
        }
    }
}
