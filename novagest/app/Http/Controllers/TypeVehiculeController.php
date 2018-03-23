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
        return view('typeVehicules', ['typeVehicules' => $typeVehicules]);
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
        //Validator

        $validator = Validator::make($request->all(), [
            'emodele' => 'required|max:32',
            'ehauteur' => 'required|max:16',
            'elargeur' => 'required|max:16',
            'epoids' => 'required|max:16',
            'epuissance' => 'required|max:8',
            'eprix_neuf' => 'required|'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typevehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeVehicule = TypeVehicule::find($id);
        $typeVehicule->modele = $request["emodele"];
        $typeVehicule->hauteur = $request["ehauteur"];
        $typeVehicule->largeur = $request["elargeur"];
        $typeVehicule->poids = $request["epoids"];
        $typeVehicule->puissance = $request["epuissance"];
        $typeVehicule->prix_neuf = $request["eprix_neuf"];
        $typeVehicule->save();

        return redirect('typevehicules');
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
        $typeVehicule->desactive = 1;
        $typeVehicule->save();
        
        return redirect('typevehicules');
    }
}
