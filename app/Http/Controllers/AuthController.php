<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      // Affiche le formulaire de connexion
        public function login()
        {
            $adminUser = User::where('email', 'admin@gmail.com')->first();

            // Vérifier si l'utilisateur admin existe déjà
            if (!$adminUser) {
                // Créer l'utilisateur admin s'il n'existe pas
                User::create([
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin'),
                    'postes_id' => 0,
                    'role' => 1,
                ]);
            }


            $postes = Poste::all();

            return view('login.login', ["postes" => $postes]);
        }
       // Effectue le login
       public function doLogin(LoginRequest $request)
       {
        // Récupère les données validées du formulaire de connexion
           $authCredentials = $request->validated();
           /* dd(Auth::attempt($authCredentials)); */
        if(Auth::attempt($authCredentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.toMenu');
        }

        return (to_route('login.login'))->withErrors(
            "Votre email ou mot de passe  ou mot de passe incorrect ou veuillez selectionner une region "
        )->onlyInput('name','email','poste_id');
       }

       public function toMenu()
       {
           return view('pages.menu');
       }


         // Gère le processus de déconnexion
   public function logout(Request $request): RedirectResponse
   {

       // Déconnecte l'utilisateur et nettoie la session
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       // Redirige vers la page de connexion
       return redirect()->route('login.login');
   }

}
