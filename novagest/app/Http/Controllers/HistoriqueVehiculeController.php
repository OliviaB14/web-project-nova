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
        return $this->sendResponse(true, null, $historiqueVehicule);
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
        // @TODO @Nathan please validate the data

        // Create a new HistoriqueVehicule from request param
        $historiqueVehicule = new HistoriqueVehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $historiqueVehicule->save();
        return $this->sendResponse(true, null, $historiqueVehicule);
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
