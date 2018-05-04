<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\PieceVehicule;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
use carbon\Carbon;  //extension dates
require app_path().'/validators.php';   //regex customs


class PieceVehiculeController extends BasicController
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
        $piecevehicules = PieceVehicule::all();
        return view('piecevehicule', ['piecevehicules' => $piecevehicules]);
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
        //formattage des dates
        $request['edate_entree'] = Carbon::parse($request['edate_entree'])->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'edate_entree' => 'required|date',
            'eidtypeetatpiece' => 'required|integer',
            'eidtypepiece' => 'required|integer',
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
        //formattage des dates
        $request['date_entree'] = Carbon::parse($request['date_entree'])->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'date_entree' => 'required|date',
            'idtypeetatpiece' => 'required|integer',
            'idtypepiece' => 'required|integer',
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
        $pieceVehicule->desactive = 1;
        $pieceVehicule->save();
        
        return redirect('piecevehicules');
    }
}
