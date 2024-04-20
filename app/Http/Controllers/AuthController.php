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

    // Processus de connexion
    public function doLogin(LoginRequest $request)
    {
        $authCredentials = $request->validated();
        if (Auth::attempt($authCredentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->route("auth.toMenu");
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => 'Invalide',
        ]);
    }

       public function toMenu()
       {
           return view('pages.menu');
       }

}
