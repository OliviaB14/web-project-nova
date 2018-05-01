<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\typeutilisateur;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class typeutilisateurController extends BasicController
{
	// public function Gettypeutilisateurs()
	// {
	// 	$typeutilisateurs = DB::table('typeutilisateur')
    //     ->get();
    //     //dd($typeutilisateurs);
	// 	return view('typeutilisateur', ['typeutilisateurs' => $typeutilisateurs]);
	// }

	public function index()
    {
        $typeutilisateurs = typeutilisateur::all();
        return view('typeutilisateur', ['typeutilisateurs' => $typeutilisateurs]);
    }

    public function show($id)
    {
        $typeutilisateur = typeutilisateur::find($id);
        if ($typeutilisateur != null) {
            return $this->sendResponse(true, null, $typeutilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeutilisateur = typeutilisateur::find($id);
        $typeutilisateur->libelle = $request["elibelle"];
        $typeutilisateur->save();

        return redirect('typeutilisateurs');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typeutilisateur from request param
        $typeutilisateur = new typeutilisateur;
        $typeutilisateur->libelle = $request["libelle"];
        $typeutilisateur->save();

        return redirect('typeutilisateurs');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $typeutilisateur = typeutilisateur::find($id);
        $typeutilisateur->desactive = 1;
        $typeutilisateur->save();
        
        return redirect('typeutilisateurs');
    }
}
