<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        if (!empty($keyword)) {
            $users = User::join('postes', 'users.postes_id', '=', 'postes.id')
                ->select('users.id', 'users.name', 'users.email','postes.region','postes.adresse')
                ->where("users.name", "LIKE", "%$keyword%")
                ->orWhere("users.email", "LIKE", "%$keyword%")
                ->orderBy('users.id', 'desc')
                ->paginate($perPage);
        } else {
            $users = User::join('postes', 'users.postes_id', '=', 'postes.id')
                ->select('users.id', 'users.name', 'users.email','postes.region','postes.adresse')
                ->paginate($perPage);
        }

        return view('pages.user.list-user', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /* navigation dans les formulaires  */
    public function create()
    {
        $postes = Poste::select('id', 'region', 'adresse','bp')->get();
        return view('pages.user.create-user', compact('postes'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $postes = Poste::select('id', 'region', 'adresse','bp')->get();
        return view('pages.user.update-user', ['user' => $user, 'postes' => $postes]);
    }
    /* ----fin----- */
    /* fonction de creation */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'Email' => 'required',
            'mdp' => 'required',
            'poste_id' => 'required'
        ]);

        $users = new User();

        $users->name = $request->input('name');
        $users->email = $request->input('Email');
        $users->password = $request->input('mdp');
        $users->postes_id = $request->input('poste_id');


        $users->save();

        return redirect()->route('user.index')->with('success', 'Utilisateur créé avec succès');
    }

    /* Fonction de mise a jour */
    public function update(Request $request, Poste $poste)
    {

        $request->validate([
            'name' => 'required',
            'Email' => 'required',
            'mdp' => 'required',
            'poste_id' => 'required'
        ]);

        $users = User::find($request->hidden_id);

        $users->name = $request->input('name');
        $users->email = $request->input('Email');
        $users->password = $request->input('mdp');
        $users->postes_id = $request->input('poste_id');

        $users->save();

        return redirect()->route('user.index')->with('success', 'Utilisateur modifier avec succès');
    }

    public function destroy(Request $request, $id){
        $user= user::findOrFail($id);

        $user->delete();
        return redirect('user')->with('success','Utilisateur supprimer!');
    }
}
