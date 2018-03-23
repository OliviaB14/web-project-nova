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
        $piecevehicule = PieceVehicule::all();
        return view('piecevehicule', ['piecevehicule' => $piecevehicule]);
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
        //Validator

        $validator = Validator::make($request->all(), [
            'edate_entree' => 'required',
            'eidtypeetatpiece' => 'required|max:12',
            'eidtypepiece' => 'required|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('piecevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $pieceVehicule = PieceVehicule::find($id);
        $pieceVehicule->date_entree = $request["edate_entree"];
        $pieceVehicule->idtypeetatpiece = $request["eidtypeetatpiece"];
        $pieceVehicule->idtypepiece = $request["eidtypepiece"];
        $pieceVehicule->save();

        return redirect('piecevehicules');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'date_entree' => 'required',
            'idtypeetatpiece' => 'required|max:12',
            'idtypepiece' => 'required|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('piecevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $pieceVehicule = new PieceVehicule;
        $pieceVehicule->date_entree = $request["date_entree"];
        $pieceVehicule->idtypeetatpiece = $request["idtypeetatpiece"];
        $pieceVehicule->idtypepiece = $request["idtypepiece"];
        $pieceVehicule->save();

        return redirect('piecevehicules');
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
