<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Facture;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PosteController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        if (!empty($keyword)) {
            $poste = Poste::select('postes.id', 'postes.region', 'postes.adresse', 'postes.bp', 'postes.email', 'postes.tel')
                ->where("postes.region", "LIKE", "%$keyword%")
                ->orWhere("postes.adresse", "LIKE", "%$keyword%")
                ->orderBy('postes.id', 'desc')
                ->paginate($perPage);
        } else {
            $poste = Poste::select('postes.id', 'postes.region', 'postes.adresse', 'postes.bp', 'postes.email', 'postes.tel')
                ->paginate($perPage);
        }

        return view('pages.poste.list-poste', compact('poste'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /* navigation dans les formulaires  */
    public function create()
    {
        return view('pages.poste.create-poste');
    }

    public function edit($id)
    {
        $poste = Poste::findOrfail($id);
        return view('pages.poste.update-poste', ['poste' => $poste]);
    }

    /* ----fin----- */
    /* fonction de creation */
    public function store(Request $request)
    {
        $request->validate([
            'region' => 'required',
            'bp' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'tel' => 'required'
        ]);

        $postes = new Poste();

        $postes->region = $request->input('region');
        $postes->adresse = $request->input('adresse');
        $postes->bp = $request->input('bp');
        $postes->email = $request->input('email');
        $postes->tel = $request->input('tel');

        $postes->save();
        $postesId = $postes->id;
        User::create([
            'name' => 'admin' . $request->input('region') . $postesId,
            'email' => 'Admin' . $request->input('region') . $postesId . '@gmail.com',
            'password' => Hash::make('admin'),
            'postes_id' => $postesId,
            'role' => 1,
        ]);

        return redirect()->route('poste.index')->with('success', 'postes créé avec succès');
    }

    /* Fonction de mise a jour */
    public function update(Request $request, Poste $poste)
    {

        $request->validate([
            'region' => 'required',
            'bp' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'tel' => 'required'
        ]);

        $postes = Poste::find($request->hidden_id);

        $postes->region = $request->input('region');
        $postes->adresse = $request->input('adresse');
        $postes->bp = $request->input('bp');
        $postes->email = $request->input('email');
        $postes->tel = $request->input('tel');

        $postes->save();

        return redirect()->route('poste.index')->with('success', 'Poste modifier avec succès');
    }

    public function destroy(Request $request, $id)
    {
        $poste = Poste::findOrFail($id);
        Facture::whereIn('id', function ($query) use ($poste) {
            $query->select('fact_id')
                ->from('courriers')
                ->where('poste_exp_id', $poste->id)
                ->orWhere('poste_dest_id', $poste->id);
        })->delete();


        Courrier::where('poste_exp_id', $poste->id)
            ->orWhere('poste_dest_id', $poste->id)
            ->delete();

        User::where('postes_id', $poste->id)
            ->delete();
            
        $poste->delete();
        return redirect('poste')->with('success', 'Poste supprimer!');
    }
}
