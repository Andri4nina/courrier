<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
      // Affiche le formulaire de connexion
      public function login()
      {
          return view('login.login');
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
