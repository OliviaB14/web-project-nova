<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\HistoriqueVehicule;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class HistoriqueVehiculeController extends BasicController
{
	// public function GetHistoriqueVehicules()
	// {
	// 	$historiqueVehicules = DB::table('HistoriqueVehicule')
    //     ->get();
    //     //dd($historiqueVehicules);
	// 	return view('HistoriqueVehicule', ['HistoriqueVehicules' => $historiqueVehicules]);
	// }

	public function index()
    {
        $historiqueVehicules = HistoriqueVehicule::all();
        return view('historiqueVehicule', ['historiqueVehicules' => $historiqueVehicules]);
    }

    public function show($id)
    {
        $historiqueVehicule = HistoriqueVehicule::find($id);
        if ($historiqueVehicule != null) {
            return $this->sendResponse(true, null, $historiqueVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'edate_ligne' => 'required|date',
            'ecommentaire' => 'required|alpha_num',
            'eidutilisateur' => 'required|integer|max:12',
            'eidtypeevenement' => 'required|integer|max:12',
            'eidvehicule' => 'required|integer|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('historiquevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $historiqueVehicule = HistoriqueVehicule::find($id);
        $historiqueVehicule->date_ligne = $request["edate_ligne"];
        $historiqueVehicule->commentaire = $request["ecommentaire"];
        $historiqueVehicule->idutilisateur = $request["eidutilisateur"];
        $historiqueVehicule->idtypeevenement = $request["eidtypeevenement"];
        $historiqueVehicule->idvehicule = $request["eidvehicule"];
        $historiqueVehicule->save();

        return redirect('historiquevehicules');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'date_ligne' => 'required|date',
            'commentaire' => 'required|alpha_num',
            'idutilisateur' => 'required|integer|max:12',
            'idtypeevenement' => 'required|integer|max:12',
            'idvehicule' => 'required|integer|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('historiquevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new historiquevehicule from request param
        $historiqueVehicule = new HistoriqueVehicule;
        $historiqueVehicule->date_ligne = $request["date_ligne"];
        $historiqueVehicule->commentaire = $request["commentaire"];
        $historiqueVehicule->idutilisateur = $request["idutilisateur"];
        $historiqueVehicule->idtypeevenement = $request["idtypeevenement"];
        $historiqueVehicule->idvehicule = $request["idvehicule"];
        $historiqueVehicule->save();

        return redirect('historiquevehicules');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $historiqueVehicule = HistoriqueVehicule::find($id);
        $historiqueVehicule->desactive = 1;
        $historiqueVehicule->save();
        
        return redirect('historiquevehicules');
    }
}
