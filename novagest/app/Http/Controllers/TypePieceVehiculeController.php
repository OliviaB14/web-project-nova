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
        $typePieceVehicules = TypePieceVehicule::all();
        return view('typePieceVehicule', ['typePieceVehicules' => $typePieceVehicules]);
    }

    public function show($id)
    {
        $typePieceVehicule = $typePieceVehicule::find($id);
        if ($typePieceVehicule != null) {
            return $this->sendResponse(true, null, $typePieceVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'enom' => 'required|max:32',
            'eidtypevehicule' => 'required|max:12',
            'eprix_neuf' => 'required',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typepiecevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typePieceVehicule = TypePieceVehicule::find($id);
        $typePieceVehicule->nom = $request["enom"];
        $typePieceVehicule->idtypevehicule = $request["eidtypevehicule"];
        $typePieceVehicule->prix_neuf = $request["eprix_neuf"];
        $typePieceVehicule->save();

        return redirect('typepiecevehicules');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:32',
            'idtypevehicule' => 'required|max:12',
            'prix_neuf' => 'required',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typepiecevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typePieceVehicule from request param
        $typePieceVehicule = new TypePieceVehicule;
        $typePieceVehicule->nom = $request["nom"];
        $typePieceVehicule->idtypevehicule = $request["idtypevehicule"];
        $typePieceVehicule->prix_neuf = $request["prix_neuf"];
        $typePieceVehicule->save();

        return redirect('typepiecevehicules');
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
