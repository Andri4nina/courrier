<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Mail\SendMail;
use App\Models\Client;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail ($idFact) {
        $courrier = (Courrier::where("fact_id","=",$idFact) -> get())[0];
        $expediteur = Client::findOrFail($courrier -> exp_id);
        $destinataire = Client::findOrFail($courrier -> dest_id);

        $toEmail = $destinataire -> email;
        $subject = "Envoye d'un colli";

        $message = "Bonjours, ".$expediteur->nom." ".$expediteur->prenom.",On vous informe que votre colli a ete envoye aujourd'hui.";
        
        Mail::to($toEmail)->send(new SendMail($message, $subject));
    
        return redirect()->route("courrier.expediteur")->with('success', 'L\'email a ete envoyer.');
    }
}
