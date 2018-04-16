<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Utilisateur;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends BasicController
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
        return response()->json($utilisateur);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'enom' => 'required|max:32',
            'eprenom' => 'required|max:32',
            'edate_naissance' => 'required',
            'eidtypeutilisateur' => 'required|max:12',
            'eusername' => 'required|max:32',
            'epassword' => 'required|max:256',
            'etelephone' => 'required|max:24',
            'efax' => 'required|max:24'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('utilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $utilisateur = Utilisateur::find($id);
        $utilisateur->nom = $request["enom"];
        $utilisateur->prenom = $request["eprenom"];
        $utilisateur->date_naissance = $request["edate_naissance"];
        $utilisateur->idtypeutilisateur = $request["eidtypeutilisateur"];
        $utilisateur->username = $request["eusername"];
        $utilisateur->password = $request["epassword"];
        $utilisateur->telephone = $request["etelephone"];
        $utilisateur->fax = $request["efax"];
        $utilisateur->save();

        return redirect('utilisateurs');
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
        $utilisateur->desactive = 1;
        $utilisateur->save();
        
        return redirect('utilisateurs');
    }
}
