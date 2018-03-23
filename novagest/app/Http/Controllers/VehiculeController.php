<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehicule;
use App\TypeVehicule;
use App\TypeEtatVehicule;
use App\StatutVehicule;
use App\Client;
use App\Agence;
use DB;
use Input;

class VehiculeController extends BasicController
{
	public function index()
    {
        $vehicules = Vehicule::all();
        $typevehicule = TypeVehicule::all();

        $idtypevehicule = TypeVehicule::pluck('modele','id');
        $idtypeetatvehicule = TypeEtatVehicule::pluck('libelle','id');
        $idstatut = StatutVehicule::pluck('libelle','id');
        $idclient = Client::pluck('raison_sociale','id');
        $idagence = Agence::pluck('nom','id');
        return view('vehicule', ['vehicules' => $vehicules,'idclient' => $idclient,'idagence' => $idagence,'typevehicules' => $typevehicule,'idtypevehicule' => $idtypevehicule,'idtypeetatvehicule' => $idtypeetatvehicule,'idstatut' => $idstatut,]);
    }

    public function show($id)
    {
        $vehicule = Vehicule::find($id);
        if ($vehicule != null) {
            return $this->sendResponse(true, null, $vehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
                //Validator

                $validator = Validator::make($request->all(), [
                    'eimmatriculation' => 'required|max:16',
                    'edate_achat' => 'required',
                    'edate_misecirculation' => 'required',
                    'eidtypevehicule' => 'required|max:12',
                    'eidtypeetatvehicule' => 'required|max:12',
                    'eidstatut' => 'required|max:12',
                    'eidclient' => 'required|max:12',
                    'eidagence' => 'required|max:12'
                ]);
        
                if ($validator->fails()) {
                    //dd($validator);
                    return redirect('vehicule')
                                ->withErrors($validator)
                                ->withInput();
                }
        
        // Find the corresponding record 
        $vehicule = Vehicule::find($id);
        $vehicule->immatriculation = $request["eimmatriculation"];
        $vehicule->date_achat = $request["edate_achat"];
        $vehicule->date_misecirculation = $request["edate_misecirculation"];
        $vehicule->idtypevehicule = $request["eidtypevehicule"];
        $vehicule->idtypeetatvehicule = $request["eidtypeetatvehicule"];
        $vehicule->idstatut = $request["eidstatut"];
        $vehicule->idclient = $request["eidclient"];
        $vehicule->idagence = $request["eidagence"];
        $vehicule->save();

        return redirect('vehicule');
    }

    public function store(Request $request)
    {
                //Validator

                $validator = Validator::make($request->all(), [
                    'immatriculation' => 'required|max:16',
                    'date_achat' => 'required',
                    'date_misecirculation' => 'required',
                    'idtypevehicule' => 'required|max:12',
                    'idtypeetatvehicule' => 'required|max:12',
                    'idstatut' => 'required|max:12',
                    'idclient' => 'required|max:12',
                    'idagence' => 'required|max:12'
                ]);
        
                if ($validator->fails()) {
                    //dd($validator);
                    return redirect('vehicule')
                                ->withErrors($validator)
                                ->withInput();
                }
        
        $vehicule = new Vehicule;
        $vehicule->immatriculation = $request["immatriculation"];
        $vehicule->date_achat = $request["date_achat"];
        $vehicule->date_misecirculation = $request["date_misecirculation"];
        $vehicule->idtypevehicule = $request["idtypevehicule"];
        $vehicule->idtypeetatvehicule = $request["idtypeetatvehicule"];
        $vehicule->idstatut = $request["idstatut"];
        $vehicule->idclient = $request["idclient"];
        $vehicule->idagence = $request["idagence"];
        $vehicule->save();

        return redirect('vehicule');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $vehicule = Vehicule::find($id);
        $vehicule->desactive = 1;
        $vehicule->save();
        
        return redirect('vehicule');
    }
}
