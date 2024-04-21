<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Courrier;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        if (!empty($keyword)) {
            $clients = Client::select('clients.*')
                ->where("clients.nom", "LIKE", "%$keyword%")
                ->orWhere("clients.prenom", "LIKE", "%$keyword%")
                ->orWhere("clients.email", "LIKE", "%$keyword%")
                ->orWhere("clients.tel", "LIKE", "%$keyword%")
                ->orWhere("clients.cin", "LIKE", "%$keyword%")
                ->orderBy('clients.id', 'desc')
                ->paginate($perPage);
        } else {
            $clients = Client::select('clients.*')
            ->where("clients.nom", "LIKE", "%$keyword%")
                ->paginate($perPage);
        }

        return view('pages.client.list-client', compact('clients'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /* navigation dans les formulaires  */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('pages.client.update-client', ['client' => $client]);
    }


    public function details($id)
    {
        $client = Client::findOrFail($id);
        $nombreCourriers = Courrier::count();
        

        return view('pages.client.detail-client', ['client' => $client]);
    }

    /* ----fin----- */
    /* fonction de creation */


    /* Fonction de mise a jour */
    public function update(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'province' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'cin' => 'required',

        ]);

        $client = Client::find($request->hidden_id);

        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->email = $request->input('email');
        $client->province = $request->input('province');
        $client->cin = $request->input('cin');


        $client->save();

        return redirect()->route('client.index')->with('success', 'Client modifier avec succès');
    }

    public function destroy(Request $request, $id){
        $client= Client::findOrFail($id);

        $client->delete();
        return redirect('client')->with('success','Client supprimer!');
    }



}
