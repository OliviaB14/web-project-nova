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
        //Validator

        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:32',
            'prenom' => 'required|max:32',
            'date_naissance' => 'required',
            'idtypeutilisateur' => 'required|max:12',
            'username' => 'required|max:32',
            'password' => 'required|max:256',
            'telephone' => 'required|max:24',
            'fax' => 'required|max:24'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('utilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new utilisateur from request param
        $utilisateur = new Utilisateur;
        $utilisateur->nom = $request["nom"];
        $utilisateur->prenom = $request["prenom"];
        $utilisateur->date_naissance = $request["date_naissance"];
        $utilisateur->idtypeutilisateur = $request["idtypeutilisateur"];
        $utilisateur->username = $request["username"];
        $utilisateur->password = $request["password"];
        $utilisateur->telephone = $request["telephone"];
        $utilisateur->fax = $request["fax"];
        $utilisateur->save();

        return redirect('utilisateurs');
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
