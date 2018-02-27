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
	// public function GetUtilisateurs()
	// {
	// 	$utilisateurs = DB::table('utilisateur')
    //     ->get();
    //     //dd($utilisateurs);
	// 	return view('utilisateur', ['users' => $utilisateurs]);
	// }

	public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateur', ['utilisateurs' => $utilisateurs]);
    }

    public function show($id)
    {
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur != null) {
            return $this->sendResponse(true, null, $utilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $utilisateur = Utilisateur::find($id);
        // Populate data
        if ($utilisateur != null) {
            $this->populateData($utilisateur, $request);
            // Save
            $utilisateur->save();
            return $this->sendResponse(true, null, $utilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new utilisateur from request param
        $utilisateur = new Utilisateur;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $utilisateur->save();
        return $this->sendResponse(true, null, $utilisateur);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $utilisateur = Utilisateur::find($id);
        // Delete record
        if ($utilisateur != null) {
            $utilisateur->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
