<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Courrier;
use App\Models\Facture;
use App\Models\Poste;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function index () {

        $postesIdForAuthUser = auth() -> user() -> postes_id;
        $postesUser = Poste::findOrfail($postesIdForAuthUser);

        $postes = Poste::all();

        return view("pages.courrier.create-courrier", ["posteUser" => $postesUser, "postes" => $postes ]);
    }

    public function create (Request $request) {

        $courriersForm = $request -> validate([
            "libelle" => "required",
            "poids" => "required",
            "prix" => "required" 
        ]);

        $destinataireForm = $request -> validate([
            "province_dest" => "required",
            "nom_dest" => "required",
            "prenom_dest" => "required",
            "adresse_dest" => "required",
            "email_dest" => ["required", "email"],
            "tel_dest" => "required",
            "cin_dest" => "required"
        ]);

        $expediteurForm = $request -> validate([
            "province_exp" => "required",
            "nom_exp" => "required",
            "prenom_exp" => "required",
            "adresse_exp" => "required",
            "email_exp" => ["required", "email"],
            "tel_exp" => "required",
            "cin_exp" => "required"
        ]);

        $expediteur = Client::create([
            "province" => $expediteurForm["province_exp"],
            "nom" => $expediteurForm["nom_exp"],
            "prenom" => $expediteurForm["prenom_exp"],
            "adresse" => $expediteurForm["adresse_exp"],
            "email" => $expediteurForm["email_exp"],
            "tel" => $expediteurForm["tel_exp"],
            "cin" => $expediteurForm["cin_exp"],
        ]);

        $destinataire = Client::create([
            "province" => $destinataireForm["province_dest"],
            "nom" => $destinataireForm["nom_dest"],
            "prenom" => $destinataireForm["prenom_dest"],
            "adresse" => $destinataireForm["adresse_dest"],
            "email" => $destinataireForm["email_dest"],
            "tel" => $destinataireForm["tel_dest"],
            "cin" => $destinataireForm["cin_dest"],
        ]);

        $facture = Facture::create([
            "libele" => $courriersForm["libelle"]
        ]);

        Courrier::create([
            "libelle" => $courriersForm["libelle"],
            "poids" => $courriersForm["poids"],
            "prix" => $courriersForm["prix"],
            "exp_id" => $expediteur["id"],
            "dest_id" => $destinataire["id"],
            "fact_id" => $facture["id"],
            "user_id" => auth() -> user() -> id
        ]);

        return redirect("/courrier");
    }
}
