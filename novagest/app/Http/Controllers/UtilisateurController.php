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
	public function index()
	{
		$users = DB::table('utilisateur')
        ->get();
        dd($users);
		return view('utilisateur', ['users' => $users]);
	}
}
