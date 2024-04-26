<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Courrier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function login()
    {
        $adminUser = User::where('email', 'SuperAdmin@gmail.com')->first();

        // Vérifier si l'utilisateur admin existe déjà
        if (!$adminUser) {
            // Créer l'utilisateur admin s'il n'existe pas
            User::create([
                'name' => 'admin',
                'email' => 'SuperAdmin@gmail.com',
                'password' => Hash::make('admin'),
                'postes_id' => 1,
                'role' => 1,
            ]);
            Poste::create([
                'region' => 'ANALAMANGA',
                'adresse' => 'lot XVIII Antanimena',
                'tel' => '034212112',
                'email' => 'poste_analamanga@gmail.com',
                'bp' => '101',
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
        if (Auth::attempt($authCredentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.toMenu');
        }

        return (to_route('login.login'))->withErrors(
            "Votre email ou mot de passe  ou mot de passe incorrect ou veuillez selectionner une region "
        )->onlyInput('name', 'email', 'poste_id');
    }

    public function toMenu()
    {
        $postId = auth()->user()->postes_id;

        $dateActuelle = Carbon::now()->startOfDay();

        // Obtiens la date il y a cinq mois à partir d'aujourd'hui
        $dateCinqMoisAvant = $dateActuelle->copy()->subMonths(5)->startOfMonth();

        // Initialise les tableaux pour les données de chaque mois
        $courriers_exp_data = [];
        $courriers_dest_data = [];

        // Initialise le tableau de labels pour les cinq derniers mois
        $labels = [];

        for ($i = 4; $i >= 0; $i--) {
            // Détermine la date du mois correspondant
            $monthDate = $dateActuelle->copy()->subMonths($i);

            // Ajoute le label au tableau de labels
            $labels[] = $monthDate->format('F Y');

            // Récupère les données pour les courriers expédiés pour ce mois
            $courriers_exp_data[$monthDate->format('F Y')] = Courrier::where('poste_exp_id', $postId)
                ->whereYear('created_at', $monthDate->year)
                ->whereMonth('created_at', $monthDate->month)
                ->count();

            // Récupère les données pour les courriers destinés pour ce mois
            $courriers_dest_data[$monthDate->format('F Y')] = Courrier::where('poste_dest_id', $postId)
                ->whereYear('created_at', $monthDate->year)
                ->whereMonth('created_at', $monthDate->month)
                ->count();
        }

        return view('pages.menu', compact('courriers_exp_data', 'courriers_dest_data', 'labels'));
    }





    // Gère le processus de déconnexion
    public function logout(Request $request): RedirectResponse
    {

        // Déconnecte l'utilisateur et nettoie la session
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige vers la page de connexion
        return redirect()->route('login.login')
        ->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
