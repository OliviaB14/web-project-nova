<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Utilisateur;
use App\typeutilisateur;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
use carbon\Carbon;  //extension dates

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
        $typeutilisateurs = typeutilisateur::pluck('libelle', 'id');
        return view('utilisateur', ['utilisateurs' => $utilisateurs, 'typeutilisateurs' => $typeutilisateurs]);
    }

    public function show($id)
    {
        $utilisateur = Utilisateur::find($id);
        return response()->json($utilisateur);
    }

    public function update($id, Request $request)
    {
        //formattage des dates
        $request['edate_naissance'] = Carbon::parse($request['edate_naissance'])->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'enom' => 'required|alpha|max:32',
            'eprenom' => 'required|alpha|max:32',
            'edate_naissance' => 'required|alpha_dash',
            'eidtypeutilisateur' => 'required|integer|max:12',
            'eusername' => 'required|alpha_num|max:32',
            'epassword' => 'required|alpha_num|max:256',
            'etelephone' => 'required|alpha_dash|max:24',
            'efax' => 'required|alpha_dash|max:24',
            'email' => 'required|email|max:64'
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
        $utilisateur->mail = $request["email"];
        $utilisateur->save();

        return redirect('utilisateurs');
    }

    public function store(Request $request)
    {
        //formattage des dates
        $request['date_naissance'] = Carbon::parse($request['date_naissance'])->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha|max:32',
            'prenom' => 'required|alpha|max:32',
            'date_naissance' => 'required|alpha_dash',
            'idtypeutilisateur' => 'required|integer|max:12',
            'username' => 'required|alpha_num|max:32',
            'password' => 'required|alpha_num|max:256',
            'telephone' => 'required|alpha_dash|max:24',
            'fax' => 'required|alpha_dash|max:24',
            'mail' => 'required|email|max:64'
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
        $utilisateur->mail = $request["mail"];
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
