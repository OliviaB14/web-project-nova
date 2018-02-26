<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypePieceVehicule;
use DB;
use Input;

class TypePieceVehiculeController extends Controller
{
	// public function Get$typePieceVehicules()
	// {
	// 	$$typePieceVehicules = DB::table('$typePieceVehicule')
    //     ->get();
    //     //dd($$typePieceVehicules);
	// 	return view('$typePieceVehicule', ['$typePieceVehicules' => $$typePieceVehicules]);
	// }

	public function index()
    {
        $$typePieceVehicule = $typePieceVehicule::all();
        return $this->sendResponse(true, null, $$typePieceVehicule);
    }

    public function show($id)
    {
        $$typePieceVehicule = $typePieceVehicule::find($id);
        if ($$typePieceVehicule != null) {
            return $this->sendResponse(true, null, $$typePieceVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $$typePieceVehicule = $typePieceVehicule::find($id);
        // Populate data
        if ($$typePieceVehicule != null) {
            $this->populateData($$typePieceVehicule, $request);
            // Save
            $$typePieceVehicule->save();
            return $this->sendResponse(true, null, $$typePieceVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new $typePieceVehicule from request param
        $$typePieceVehicule = new $typePieceVehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $$typePieceVehicule->save();
        return $this->sendResponse(true, null, $$typePieceVehicule);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $$typePieceVehicule = $typePieceVehicule::find($id);
        // Delete record
        if ($$typePieceVehicule != null) {
            $$typePieceVehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
