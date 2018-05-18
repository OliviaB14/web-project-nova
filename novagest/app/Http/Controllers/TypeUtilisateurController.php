<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeUtilisateur;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/Validators.php';   //regex customs


class typeutilisateurController extends BasicController
{
	public function index()
    {
        $typeutilisateurs = Typeutilisateur::all();
        return view('typeutilisateur', ['typeutilisateurs' => $typeutilisateurs]);
    }

    public function show($id)
    {
        $typeutilisateur = TypeUtilisateur::find($id);  
        return response()->json($typeutilisateur);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {

            return redirect('typeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeutilisateur = TypeUtilisateur::find($id);
        $typeutilisateur->libelle = $request["elibelle"];
        $typeutilisateur->save();

        return redirect('typeutilisateurs');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typeutilisateur from request param
        $typeutilisateur = new TypeUtilisateur;
        $typeutilisateur->libelle = $request["libelle"];
        $typeutilisateur->save();

        return redirect('typeutilisateurs');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $typeutilisateur = TypeUtilisateur::find($id);
        $typeutilisateur->desactive = 1;
        $typeutilisateur->save();
        
        return redirect('typeutilisateurs');
    }
}
