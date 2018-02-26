<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeVehicule;
use DB;
use Input;

class TypeVehiculeController extends Controller
{
	// public function GetTypeVehicules()
	// {
	// 	$typeVehicules = DB::table('TypeVehicule')
    //     ->get();
    //     //dd($typeVehicules);
	// 	return view('TypeVehicule', ['TypeVehicules' => $typeVehicules]);
	// }

	public function index()
    {
        $typeVehicule = TypeVehicule::all();
        return $this->sendResponse(true, null, $typeVehicule);
    }

    public function show($id)
    {
        $typeVehicule = TypeVehicule::find($id);
        if ($typeVehicule != null) {
            return $this->sendResponse(true, null, $typeVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $typeVehicule = TypeVehicule::find($id);
        // Populate data
        if ($typeVehicule != null) {
            $this->populateData($typeVehicule, $request);
            // Save
            $typeVehicule->save();
            return $this->sendResponse(true, null, $typeVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new TypeVehicule from request param
        $typeVehicule = new TypeVehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $typeVehicule->save();
        return $this->sendResponse(true, null, $typeVehicule);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $typeVehicule = TypeVehicule::find($id);
        // Delete record
        if ($typeVehicule != null) {
            $typeVehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
