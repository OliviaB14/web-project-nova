<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\StatutVehicule;
use DB;
use Input;

class StatutVehiculeController extends Controller
{
	// public function GetStatutVehicules()
	// {
	// 	$statutVehicules = DB::table('StatutVehicule')
    //     ->get();
    //     //dd($statutVehicules);
	// 	return view('StatutVehicule', ['StatutVehicules' => $statutVehicules]);
	// }

	public function index()
    {
        $statutvehicule = StatutVehicule::all();

        return view('statutvehicule', ['statutvehicule' => $statutvehicule]);
    }

    public function show($id)
    {
        $statutVehicule = StatutVehicule::find($id);
        if ($statutVehicule != null) {
            return $this->sendResponse(true, null, $statutVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $statutVehicule = StatutVehicule::find($id);
        // Populate data
        if ($statutVehicule != null) {
            $this->populateData($statutVehicule, $request);
            // Save
            $statutVehicule->save();
            return $this->sendResponse(true, null, $statutVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new StatutVehicule from request param
        $statutVehicule = new StatutVehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $statutVehicule->save();
        return $this->sendResponse(true, null, $statutVehicule);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $statutVehicule = StatutVehicule::find($id);
        // Delete record
        if ($statutVehicule != null) {
            $statutVehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
