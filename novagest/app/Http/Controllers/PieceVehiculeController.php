<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PieceVehicule;
use DB;
use Input;

class PieceVehiculeController extends Controller
{
	// public function GetPieceVehicules()
	// {
	// 	$pieceVehicules = DB::table('PieceVehicule')
    //     ->get();
    //     //dd($pieceVehicules);
	// 	return view('PieceVehicule', ['PieceVehicules' => $pieceVehicules]);
	// }

	public function index()
    {
        $pieceVehicule = PieceVehicule::all();
        return $this->sendResponse(true, null, $pieceVehicule);
    }

    public function show($id)
    {
        $pieceVehicule = PieceVehicule::find($id);
        if ($pieceVehicule != null) {
            return $this->sendResponse(true, null, $pieceVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $pieceVehicule = PieceVehicule::find($id);
        // Populate data
        if ($pieceVehicule != null) {
            $this->populateData($pieceVehicule, $request);
            // Save
            $pieceVehicule->save();
            return $this->sendResponse(true, null, $pieceVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new PieceVehicule from request param
        $pieceVehicule = new PieceVehicule;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $pieceVehicule->save();
        return $this->sendResponse(true, null, $pieceVehicule);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $pieceVehicule = PieceVehicule::find($id);
        // Delete record
        if ($pieceVehicule != null) {
            $pieceVehicule->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
