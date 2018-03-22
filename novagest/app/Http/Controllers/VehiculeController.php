<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehicule;
use App\TypeVehicule;
use DB;
use Input;

class VehiculeController extends Controller
{
	// public function GetVehicules()
	// {
	// 	$vehicules = DB::table('Vehicule')
    //     ->get();
    //     //dd($vehicules);
	// 	return view('Vehicule', ['Vehicules' => $vehicules]);
	// }

	public function index()
    {
        $vehicules = Vehicule::all();
        $typevehicule = TypeVehicule::all();
        return view('vehicules', ['vehicules' => $vehicules,'typevehicules' => $typevehicule]);
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
        // @TODO @Nathan please validate the data

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
        // @TODO @Nathan please validate the data

        // Create a new Vehicule from request param
        $vehicule = new Vehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $vehicule->save();
        return $this->sendResponse(true, null, $vehicule);
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
}
