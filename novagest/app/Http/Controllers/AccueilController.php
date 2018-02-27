<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agence;
use App\Vehicule;
use App\Utilisateur;
use Input;

class AccueilController extends Controller
{
    public function index()
    {
        $agences = Agence::all()->count();
        $vehicules = Vehicule::all()->count();
        $utilisateurs = Utilisateur::all()
        ->where('idtypeutilisateur', '==', 1)
        ->count();

        return view('accueil', ['agences' => $agences, 'vehicules' => $vehicules, 'utilisateurs' => $utilisateurs]);
    }
}