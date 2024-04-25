<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Courrier;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactController extends Controller
{
    public function generate ($idFact) {

        $courrier = (Courrier::where("fact_id","=",$idFact) -> get())[0];
        $expediteur = Client::findOrFail($courrier -> exp_id);
        $destinataire = Client::findOrFail($courrier -> dest_id);

        $poste = [
            "post_exp" => Poste::findOrFail($expediteur -> province),
            "post_dest" => Poste::findOrFail($destinataire -> province)
        ];

        $data = [
            "courrier" => $courrier,
            "expediteur" => $expediteur,
            "destinataire" => $destinataire,
            "poste" => $poste
        ];

        $pdf = Pdf::loadView('pdf.pdf-generate', $data);
        return $pdf->download('invoice.pdf');
    }

    public function index () {
        return view("pdf.pdf-generate");
    }
}
