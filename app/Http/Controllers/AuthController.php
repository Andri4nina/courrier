<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
      // Affiche le formulaire de connexion
        public function login()
        {  
            $postes = Poste::all();

            return view('login.login', ["postes" => $postes]);
        }
       // Effectue le login
       public function dologin()
       {
           return view('pages.menu');
       }

       public function toMenu()
       {
           return view('pages.menu');
       }

}
