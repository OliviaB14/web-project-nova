<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ville;
use DB;
use Input;

class VilleController extends Controller
{
	public function GetVilles()
	{
		$villes = DB::table('ville')
        ->get();
        //dd($villes);
		return view('ville', ['villes' => $villes]);
	}
}
