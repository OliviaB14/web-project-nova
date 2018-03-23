<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HistoriqueVehicule;
use DB;
use Input;

class HistoriqueVehiculeController extends Controller
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
        $historiqueVehicule = HistoriqueVehicule::all();
        return view('historiqueVehicule', ['historiqueVehicule' => $historiqueVehicule]);
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
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $historiqueVehicule = HistoriqueVehicule::find($id);
        // Populate data
        if ($historiqueVehicule != null) {
            $this->populateData($historiqueVehicule, $request);
            // Save
            $historiqueVehicule->save();
            return $this->sendResponse(true, null, $historiqueVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'date_ligne' => 'required',
            'commentaire' => 'required',
            'idutilisateur' => 'required|max:12',
            'idtypeevenement' => 'required|max:12',
            'idvehicule' => 'required|max:12',
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
        // Delete record
        if ($historiqueVehicule != null) {
            $historiqueVehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
