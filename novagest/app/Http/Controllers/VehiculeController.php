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
use App\Ville;
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
        return view('vehicules', ['vehicules' => $vehicules,'idclient' => $idclient,'idagence' => $idagence,'typevehicules' => $typevehicule,'idtypevehicule' => $idtypevehicule,'idtypeetatvehicule' => $idtypeetatvehicule,'idstatut' => $idstatut,]);
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
        // Find the corresponding record
        $vehicule = Vehicule::find($id);
        // Populate data
        if ($vehicule != null) {
            $this->populateData($vehicule, $request);
            // Save
            $vehicule->save();
            return $this->sendResponse(true, null, $vehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
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

        return redirect('vehicules');
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $vehicule = Vehicule::find($id);
        // Delete record
        if ($vehicule != null) {
            $vehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function GetSingle($id)
    {
        // Find the corresponding record
        $vehicule = Vehicule::find($id);
        //dd($vehicule);

        $agence = Agence::find($vehicule->idagence);
        $client = Client::find($vehicule->idclient);
        $type_vehicule = TypeVehicule::find($vehicule->idtypevehicule);

        if($agence != null)
        {
            $ville = Ville::find($agence->idville);
            return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule,'agence' => $agence,'ville' => $ville]);
        }
        elseif($client != null)
        {
            $ville = Ville::find($client->idville);
            return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule,'client' => $client,'ville' => $ville]);
        }

        
        return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule]);
    }
}
