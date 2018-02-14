<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use DB;
use Input;

class UtilisateurController extends Controller
{
	public function GetUtilisateurs()
	{
		$utilisateurs = DB::table('utilisateur')
        ->get();
        //dd($utilisateurs);
		return view('utilisateur', ['users' => $utilisateurs]);
	}
}
