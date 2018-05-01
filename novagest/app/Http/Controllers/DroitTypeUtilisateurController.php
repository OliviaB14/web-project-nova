<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\DroitTypeUtilisateur;
use App\TypeUtilisateur;
use App\Droit;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class DroitTypeUtilisateurController extends BasicController
{
	public function index()
    {
        $droitTypeUtilisateurs = DroitTypeUtilisateur::all();
        $droits = Droit::all();
        $typeUtilisateurs = TypeUtilisateur::all();
        
        return view('droittypeutilisateur', ['typeUtilisateurs' => $typeUtilisateurs,'droitTypeUtilisateurs' => $droitTypeUtilisateurs,'droits' => $droits]);
    }

    public function switch($typeDroit,$typeUser,Request $request)
    {
            //$switchverif = DB::select( DB::raw("SELECT * FROM droit_type_utilisateur WHERE iddroit = '$typeDroit' and idtypeutilisateur = '$typeUser'"));
            $switchverif = DroitTypeUtilisateur::where(`iddroit`, `=`, $typeDroit)
            ->where(`idtypeutilisateur`, `=`, $typeUser)
            ->select('*');

            if (count($switchverif)) {
                
            }
            else
            {
                // Create a new droitTypeUtilisateur from request param
                $droitTypeUtilisateur = new DroitTypeUtilisateur;
                $droitTypeUtilisateur->iddroit = $typeDroit;
                $droitTypeUtilisateur->idtypeutilisateur = $typeUser;
                $droitTypeUtilisateur->save();
            }
    }

    public function show($id)
    {
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        if ($droitTypeUtilisateur != null) {
            return $this->sendResponse(true, null, $droitTypeUtilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'eiddroit' => 'required|integer|max:12',
            'eidtypeutilisateur' => 'required|integer|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('droittypeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        $droitTypeUtilisateur->iddroit = $request["eiddroit"];
        $droitTypeUtilisateur->idtypeutilisateur = $request["eidtypeutilisateur"];
        $droitTypeUtilisateur->save();

        return redirect('droittypeutilisateurs');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'iddroit' => 'required|integer|max:12',
            'idtypeutilisateur' => 'required|integer|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('droittypeutilisateurs')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new droitTypeUtilisateur from request param
        $droitTypeUtilisateur = new DroitTypeUtilisateur;
        $droitTypeUtilisateur->iddroit = $request["iddroit"];
        $droitTypeUtilisateur->idtypeutilisateur = $request["idtypeutilisateur"];
        $droitTypeUtilisateur->save();

        return redirect('droittypeutilisateurs');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        $droitTypeUtilisateur->desactive = 1;
        $droitTypeUtilisateur->save();
        
        return redirect('droittypeutilisateurs');
    }
}
