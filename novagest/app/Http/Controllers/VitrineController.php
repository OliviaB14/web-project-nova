<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agence;
use App\Vehicule;
use App\Utilisateur;
use Input;

class VitrineController extends Controller
{
    public function index()
    {
        $agences = Agence::all()->count();
        $vehicules = Vehicule::all()->count();

        return view('vitrine', ['agences' => $agences, 'vehicules' => $vehicules]);
    }
}