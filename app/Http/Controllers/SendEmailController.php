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
    public function sendEmail($idFact)
    {
        $courrier = Courrier::where("fact_id", $idFact)->firstOrFail();
        $expediteur = Client::findOrFail($courrier->exp_id);
        $destinataire = Client::findOrFail($courrier->dest_id);

        $expediteurEmail = $expediteur->email;
        $destinataireEmail = $destinataire->email;
        $expediteurSubject = "Envoi d'un colis";
        $destinataireSubject = "Réception d'un colis";

        $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nNous vous informons que votre colis a été envoyé aujourd'hui.";
        $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nNous vous informons que vous avez un colis en attente de réception de la part de " . $expediteur->nom . " " . $expediteur->prenom . ". Veuillez vous préparer à recevoir votre colis.";

        Mail::to($expediteurEmail)->send(new SendMail($expediteurMessage, $expediteurSubject));
        Mail::to($destinataireEmail)->send(new SendMail($destinataireMessage, $destinataireSubject));

        return redirect()->route("courrier.expediteur")->with('success', 'Les emails ont été envoyés.');
    }

    public function sendEmailReturn($idFact)
    {
        $courrier = Courrier::where("fact_id", $idFact)->firstOrFail();
        $expediteur = Client::findOrFail($courrier->exp_id);
        $destinataire = Client::findOrFail($courrier->dest_id);

        $expediteurEmail = $expediteur->email;
        $destinataireEmail = $destinataire->email;
        $expediteurSubject = "Confirmation de l'arrivée du colis à la poste";
        $destinataireSubject = "Arrivée du colis à la poste";

        $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nNous vous informons que votre colis envoyé à " . $destinataire->nom . " " . $destinataire->prenom . " est arrivé aujourd'hui à la poste et est prêt à être récupéré.";
        $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nNous vous informons que le colis envoyé par " . $expediteur->nom . " " . $expediteur->prenom . " est arrivé aujourd'hui à la poste. Vous pouvez maintenant venir le récupérer.";

        Mail::to($expediteurEmail)->send(new SendMail($expediteurMessage, $expediteurSubject));
        Mail::to($destinataireEmail)->send(new SendMail($destinataireMessage, $destinataireSubject));

        return redirect()->route("courrier.destinataire")->with('success', 'Les emails ont été envoyés.');
    }


    public function sendEmailRappel($idFact, $status)
    {
        $courrier = Courrier::where("fact_id", $idFact)->firstOrFail();
        $expediteur = Client::findOrFail($courrier->exp_id);
        $destinataire = Client::findOrFail($courrier->dest_id);

        $expediteurEmail = $expediteur->email;
        $destinataireEmail = $destinataire->email;
        $expediteurSubject = "Rappel de récupération du colis";
        $destinataireSubject = "Rappel de réception du colis";

        if ($status === 0) {
            $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nCeci est un rappel que le colis que vous avez envoyé à " . $destinataire->nom . " " . $destinataire->prenom . " n'a pas encore été récupéré.";
            $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nCeci est un rappel que le colis envoyé par " . $expediteur->nom . " " . $expediteur->prenom . " n'a pas encore été reçu.";
        } else {
            $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nCeci est un rappel que le colis que vous avez envoyé à " . $destinataire->nom . " " . $destinataire->prenom . " a déjà été récupéré.";
            $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nCeci est un rappel que vous avez déjà reçu le colis envoyé par " . $expediteur->nom . " " . $expediteur->prenom . ".";
        }

        Mail::to($expediteurEmail)->send(new SendMail($expediteurMessage, $expediteurSubject));
        Mail::to($destinataireEmail)->send(new SendMail($destinataireMessage, $destinataireSubject));

        return back()->with('success', 'Les emails ont été envoyés pour rappeler la récupération du colis.');
    }
}
