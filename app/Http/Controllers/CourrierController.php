<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Courrier;
use App\Models\Facture;
use App\Models\Poste;
use Illuminate\Http\Request;

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

        // dd($expediteur["province"], $destinataire["province"]);

        Courrier::create([
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


    public function showExpCourrier(Request $request)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $courriers = Courrier::join('clients as exp', 'courriers.exp_id', '=', 'exp.id')
                ->join('clients as dest', 'courriers.dest_id', '=', 'dest.id')
                ->where(function ($query) use ($keyword) {
                    $query->where('exp.nom', 'LIKE', "%$keyword%")
                        ->orWhere('exp.prenom', 'LIKE', "%$keyword%")
                        ->orWhere('exp.adresse', 'LIKE', "%$keyword%")
                        ->orWhere('exp.tel', 'LIKE', "%$keyword%")
                        ->orWhere('exp.cin', 'LIKE', "%$keyword%")
                        ->orWhere('exp.email', 'LIKE', "%$keyword%")
                        ->orwhere('dest.nom', 'LIKE', "%$keyword%")
                        ->orWhere('dest.prenom', 'LIKE', "%$keyword%")
                        ->orWhere('dest.adresse', 'LIKE', "%$keyword%")
                        ->orWhere('dest.tel', 'LIKE', "%$keyword%")
                        ->orWhere('dest.cin', 'LIKE', "%$keyword%")
                        ->orWhere('dest.email', 'LIKE', "%$keyword%")
                        ->orWhere('courriers.libelle', 'LIKE', "%$keyword%");
                })
                ->where('courriers.status', 0)
                ->where('courriers.poste_exp_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        } else {
            $courriers = Courrier::join('clients as exp', 'courriers.exp_id', '=', 'exp.id')
                ->join('clients as dest', 'courriers.dest_id', '=', 'dest.id')
                ->where('courriers.status', 0)
                ->where('courriers.poste_exp_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        }
        $count = !is_null($courriers) ? count($courriers) : 0;

        return view('pages.courrier.list-env-courrier',compact('courriers', 'count'));
    }
    public function showDestCourrier(Request $request)
    {
        $postesIdForAuthUser = auth()->user()->postes_id;

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $courriers = Courrier::join('clients as exp', 'courriers.exp_id', '=', 'exp.id')
                ->join('clients as dest', 'courriers.dest_id', '=', 'dest.id')
                ->where(function ($query) use ($keyword) {
                    $query->where('exp.nom', 'LIKE', "%$keyword%")
                        ->orWhere('exp.prenom', 'LIKE', "%$keyword%")
                        ->orWhere('exp.adresse', 'LIKE', "%$keyword%")
                        ->orWhere('exp.tel', 'LIKE', "%$keyword%")
                        ->orWhere('exp.cin', 'LIKE', "%$keyword%")
                        ->orWhere('exp.email', 'LIKE', "%$keyword%")
                        ->orwhere('dest.nom', 'LIKE', "%$keyword%")
                        ->orWhere('dest.prenom', 'LIKE', "%$keyword%")
                        ->orWhere('dest.adresse', 'LIKE', "%$keyword%")
                        ->orWhere('dest.tel', 'LIKE', "%$keyword%")
                        ->orWhere('dest.cin', 'LIKE', "%$keyword%")
                        ->orWhere('dest.email', 'LIKE', "%$keyword%")
                        ->orWhere('courriers.libelle', 'LIKE', "%$keyword%");
                })
                ->where('courriers.status', 0)
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        } else {
            $courriers = Courrier::join('clients as exp', 'courriers.exp_id', '=', 'exp.id')
                ->join('clients as dest', 'courriers.dest_id', '=', 'dest.id')
                ->where('courriers.status', 0)
                ->where('courriers.poste_dest_id', $postesIdForAuthUser)
                ->orderBy('courriers.created_at', 'desc')
                ->paginate($perPage);
        }

        $count = !is_null($courriers) ? count($courriers) : 0;

        return view('pages.courrier.list-rec-courrier', compact('courriers', 'count'));
    }
}
