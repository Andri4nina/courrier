<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Poste;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client as TwiCli;
class CourrierController extends Controller
{
    public function index()
    {

        $postesIdForAuthUser = auth()->user()->postes_id;
        $postesUser = Poste::findOrfail($postesIdForAuthUser);

        $postes = Poste::all();

        return view("pages.courrier.create-courrier", ["posteUser" => $postesUser, "postes" => $postes]);
    }

    public function create(Request $request)
    {

        $courriersForm = $request->validate([
            "libelle" => "required",
            "poids" => "required",
            "prix" => "required"
        ]);

        $destinataireForm = $request->validate([
            "province_dest" => "required",
            "nom_dest" => "required",
            "prenom_dest" => "required",
            "adresse_dest" => "required",
            "email_dest" => ["required", "email"],
            "tel_dest" => "required",
            "cin_dest" => "required"
        ]);

        $expediteurForm = $request->validate([
            "province_exp" => "required",
            "nom_exp" => "required",
            "prenom_exp" => "required",
            "adresse_exp" => "required",
            "email_exp" => ["required", "email"],
            "tel_exp" => "required",
            "cin_exp" => "required"
        ]);

        $expediteur = Client::where('cin', $expediteurForm['cin_exp'])->first();


        if ($expediteur) {
            $expediteurId = $expediteur->id;
        } else {

            $expediteur = Client::create([
                "province" => $expediteurForm["province_exp"],
                "nom" => $expediteurForm["nom_exp"],
                "prenom" => $expediteurForm["prenom_exp"],
                "adresse" => $expediteurForm["adresse_exp"],
                "email" => $expediteurForm["email_exp"],
                "tel" => $expediteurForm["tel_exp"],
                "cin" => $expediteurForm["cin_exp"],
            ]);
            $expediteurId = $expediteur->id;
        }


        $destinataire = Client::where('cin', $destinataireForm['cin_dest'])->first();

        if ($destinataire) {
            $destinataireId = $destinataire->id;
        } else {
            $destinataire = Client::create([
                "province" => $destinataireForm["province_dest"],
                "nom" => $destinataireForm["nom_dest"],
                "prenom" => $destinataireForm["prenom_dest"],
                "adresse" => $destinataireForm["adresse_dest"],
                "email" => $destinataireForm["email_dest"],
                "tel" => $destinataireForm["tel_dest"],
                "cin" => $destinataireForm["cin_dest"],
            ]);
            $destinataireId = $destinataire->id;
        }

        $facture = Facture::create([
            "libele" => $courriersForm["libelle"]
        ]);

        $courrier = Courrier::create([
            "libelle" => $courriersForm["libelle"],
            "poids" => $courriersForm["poids"],
            "prix" => $courriersForm["prix"],
            "exp_id" => $expediteurId,
            "poste_exp_id" => $expediteurForm["province_exp"],
            "poste_dest_id" => $destinataireForm["province_dest"],
            "dest_id" => $destinataireId,
            "fact_id" => $facture["id"],
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route('courrier.expediteur')->with('success', 'Colis créé avec succès');
    }


    public function listExpCourrier(Request $request)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;

        $keyword = $request->get('search');
        $perPage = 10;


        if (!empty($keyword)) {
            $courriers = Courrier::with( 'exp_post', 'dest_post')
                ->where('courriers.poste_exp_id', $postesIdForAuthUser)
                ->where('courriers.status', 0)
                ->Where('courriers.libelle', 'LIKE', "%$keyword%")
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        } else {
            $courriers = Courrier::with('exp_post', 'dest_post')
                ->where('courriers.status', 0)
                ->where('courriers.poste_exp_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        }
        $count = !is_null($courriers) ? count($courriers) : 0;

        return view('pages.courrier.list-env-courrier', compact('courriers', 'count'));
    }


    public function listDestCourrier(Request $request)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $courriers = Courrier::with( 'exp_post', 'dest_post')
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->where('courriers.status', 0)
                ->Where('courriers.libelle', 'LIKE', "%$keyword%")
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        } else {
            $courriers = Courrier::with( 'exp_post', 'dest_post')
                ->where('courriers.status', 0)
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        }
        $count = !is_null($courriers) ? count($courriers) : 0;

        return view('pages.courrier.list-rec-courrier', compact('courriers', 'count'));
    }


    public function showDetailCourrier($id)
    {
        $courriers = Courrier::with('exp', 'dest', 'exp_post', 'dest_post')
        ->findOrFail($id);
        return view('pages.courrier.detail-courrier', ['courriers' => $courriers]);
    }

    public function edit($id)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;
        $postesUser = Poste::findOrfail($postesIdForAuthUser);
        $postes = Poste::all();
        $courriers = Courrier::with('exp', 'dest', 'exp_post', 'dest_post')
        ->findOrFail($id);
        return view('pages.courrier.update-courrier', ['courriers' => $courriers,"posteUser" => $postesUser, "postes" => $postes]);
    }


    public function update(Request $request)
    {

        $courriersForm = $request->validate([
            "libelle" => "required",
            "poids" => "required",
            "prix" => "required"
        ]);

        $destinataireForm = $request->validate([
            "province_dest" => "required",
            "nom_dest" => "required",
            "prenom_dest" => "required",
            "adresse_dest" => "required",
            "email_dest" => ["required", "email"],
            "tel_dest" => "required",
            "cin_dest" => "required"
        ]);

        $expediteurForm = $request->validate([
            "province_exp" => "required",
            "nom_exp" => "required",
            "prenom_exp" => "required",
            "adresse_exp" => "required",
            "email_exp" => ["required", "email"],
            "tel_exp" => "required",
            "cin_exp" => "required"
        ]);

        $expediteur = Client::where('cin', $expediteurForm['cin_exp'])->first();


        if ($expediteur) {
            $expediteurId = $expediteur->id;
        } else {

            $expediteur = Client::create([
                "province" => $expediteurForm["province_exp"],
                "nom" => $expediteurForm["nom_exp"],
                "prenom" => $expediteurForm["prenom_exp"],
                "adresse" => $expediteurForm["adresse_exp"],
                "email" => $expediteurForm["email_exp"],
                "tel" => $expediteurForm["tel_exp"],
                "cin" => $expediteurForm["cin_exp"],
            ]);
            $expediteurId = $expediteur->id;
        }


        $destinataire = Client::where('cin', $destinataireForm['cin_dest'])->first();

        if ($destinataire) {
            $destinataireId = $destinataire->id;
        } else {
            $destinataire = Client::create([
                "province" => $destinataireForm["province_dest"],
                "nom" => $destinataireForm["nom_dest"],
                "prenom" => $destinataireForm["prenom_dest"],
                "adresse" => $destinataireForm["adresse_dest"],
                "email" => $destinataireForm["email_dest"],
                "tel" => $destinataireForm["tel_dest"],
                "cin" => $destinataireForm["cin_dest"],
            ]);
            $destinataireId = $destinataire->id;
        }



        // dd($expediteur["province"], $destinataire["province"]);

        $courrier = Courrier::find($request->hidden_id);
        $facture = Facture::findOrFail($courrier->fact_id);
        $facture->libele = $courriersForm["libelle"];
        $facture->save();

        $courrier->libelle = $courriersForm["libelle"];
        $courrier->poids = $courriersForm["poids"];
        $courrier->prix = $courriersForm["prix"];
        $courrier->exp_id = $expediteurId;
        $courrier->poste_exp_id = $expediteurForm["province_exp"];
        $courrier->poste_dest_id = $destinataireForm["province_dest"];
        $courrier->dest_id = $destinataireId;
        $courrier->fact_id = $facture["id"];
        $courrier->user_id = auth()->user()->id;


        $courrier->save();
        return redirect()->route('courrier.expediteur')->with('success', 'Colis modifier avec succès');
    }

    public function reception(Request $request,$idFact)
    {
        $courrier = Courrier::find($request->hidden_id);
        $courrier->status = 1;
        $courrier->save();

        $courrier = Courrier::where("fact_id", $idFact)->firstOrFail();
        $expediteur = Client::findOrFail($courrier->exp_id);
        $destinataire = Client::findOrFail($courrier->dest_id);

        $expediteurEmail = $expediteur->email;
        $destinataireEmail = $destinataire->email;
        $expediteurSubject = "Confirmation de récupération du colis";
        $destinataireSubject = "Confirmation de réception du colis";

        $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nNous vous confirmons que le colis que vous avez envoyé à " . $destinataire->nom . " " . $destinataire->prenom . " a été récupéré .";
        $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nNous vous confirmons que vous avez bien reçu le colis envoyé par " . $expediteur->nom . " " . $expediteur->prenom . ".";

        Mail::to($expediteurEmail)->send(new SendMail($expediteurMessage, $expediteurSubject));
        Mail::to($destinataireEmail)->send(new SendMail($destinataireMessage, $destinataireSubject));

        $sid = getenv('TWILIO_SID');
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new TwiCli($sid, $token);


        $message = $twilio->messages
            ->create("+261345114323", [
                "body" => "Confirmation que le colis est recuperer",
                "from" => $sender
            ]);


        return redirect()->route('courrier.destinataire')->with('success', 'Colis recu avec succès');
    }

    public function receptionReturn(Request $request,$idFact)
    {
        $courrier = Courrier::find($request->hidden_id);
        $courrier->status = 0;
        $courrier->save();

        $courrier = Courrier::where("fact_id", $idFact)->firstOrFail();
        $expediteur = Client::findOrFail($courrier->exp_id);
        $destinataire = Client::findOrFail($courrier->dest_id);

        $expediteurEmail = $expediteur->email;
        $destinataireEmail = $destinataire->email;
        $expediteurSubject = "Annulation de la confirmation de récupération du colis";
        $destinataireSubject = "Annulation de la confirmation de réception du colis";

        $expediteurMessage = "Bonjour " . $expediteur->prenom . ",\n\nNous vous informons que le colis que vous avez envoyé à " . $destinataire->nom . " " . $destinataire->prenom . " n'est pas encore recuperer.";
        $destinataireMessage = "Bonjour " . $destinataire->prenom . ",\n\nNous vous informons l'annulation de la confirmation de reception du colis envoyé par " . $expediteur->nom . " " . $expediteur->prenom . ".";

        Mail::to($expediteurEmail)->send(new SendMail($expediteurMessage, $expediteurSubject));
        Mail::to($destinataireEmail)->send(new SendMail($destinataireMessage, $destinataireSubject));

        $sid = getenv('TWILIO_SID');
        $token = getenv("TWILIO_AUTH_TOKEN");
        $sender = getenv('TWILIO_PHONE_NUMBER');

        $twilio = new TwiCli($sid, $token);


        $message = $twilio->messages
            ->create("+261345114323", [
                "body" => "Desole,  l'annulation de confirmation que le colis est recuperer",
                "from" => $sender
            ]);


        return redirect()->route('courrier.destinataire')->with('success', 'Annulation de confirmation');
    }

    public function archive(Request $request)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $courriers = Courrier::with( 'exp_post', 'dest_post')
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->where('courriers.status', 1)
                ->Where('courriers.libelle', 'LIKE', "%$keyword%")
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        } else {
            $courriers = Courrier::with( 'exp_post', 'dest_post')
                ->where('courriers.status', 1)
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        }
        $count = !is_null($courriers) ? count($courriers) : 0;

        return view('pages.archive.archive', compact('courriers', 'count'));
    }


    public function destroy(Request $request, $id){
        $courrier= Courrier::findOrFail($id);
        $courrier->delete();
        return redirect('courrier/expedition')->with('success','Colis supprimer!');
    }


}
