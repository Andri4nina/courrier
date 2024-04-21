<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class ParametreController extends Controller
{
    public function index ($id)
    {
        $user = User::findOrFail($id);

        return view("pages.parametre.parametre-user",['user' => $user]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'Email' => 'required',
            'mdp' => 'required',
        ]);

        $users = User::find($request->hidden_id);

        $users->name = $request->input('name');
        $users->email = $request->input('Email');
        $users->password = Hash::make($request->input('mdp'));

        $users->save();

        return back()->with('success', 'Utilisateur modifié avec succès');
}

}
