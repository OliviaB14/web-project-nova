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
        $typeVehicules = TypeVehicule::all();
        return view('typeVehicule', ['typeVehicules' => $typeVehicules]);
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
        //Validator

        $validator = Validator::make($request->all(), [
            'modele' => 'required|max:32',
            'hauteur' => 'required|max:16',
            'largeur' => 'required|max:16',
            'poids' => 'required|max:16',
            'puissance' => 'required|max:8',
            'prix_neuf' => 'required|'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typevehicule from request param
        $typeVehicule = new TypeVehicule;
        $typeVehicule->modele = $request["modele"];
        $typeVehicule->hauteur = $request["hauteur"];
        $typeVehicule->largeur = $request["largeur"];
        $typeVehicule->poids = $request["poids"];
        $typeVehicule->puissance = $request["puissance"];
        $typeVehicule->prix_neuf = $request["prix_neuf"];
        $typeVehicule->save();

        return redirect('typevehicules');
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
