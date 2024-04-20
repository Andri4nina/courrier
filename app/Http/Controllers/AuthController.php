<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
      // Affiche le formulaire de connexion
        public function login()
        {
            $postes = Poste::all();

            return view('login.login', ["postes" => $postes]);
        }
       // Effectue le login
       public function doLogin()
       {
           // Récupère les données validées du formulaire de connexion
        //    $authCredentials = $request->validated();
           // Tente de connecter l'utilisateur avec les informations fournies
        //    if (Auth::attempt($authCredentials)) {
          // Régénère la session pour des raisons de sécurité
            //    $request->session()->regenerate();
            //    Redirige vers la page de tableau de bord après la connexion réussie

        //    }
            // Redirige vers la page de connexion avec une erreur en cas d'échec de connexion
/*            return redirect()->route('auth.login')->withErrors([
               'email' => 'Invalide',
           ]);
 */
           return redirect()->route("auth.toMenu");
       }

       public function toMenu()
       {
           return view('pages.menu');
       }

}
