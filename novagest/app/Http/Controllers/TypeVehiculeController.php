<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeVehicule;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/validators.php';   //regex customs


class TypeVehiculeController extends BasicController
{
	public function index()
    {
        $typeVehicules = TypeVehicule::all();

        //dd($typeVehicules);

        return view('typevehicule', ['typeVehicules' => $typeVehicules]);
    }

    public function show($id)
    {
        try{
            $type = DB::table("type_vehicule")
            ->select('modele','hauteur','largeur','poids','puissance','prix_neuf','description')
            ->where("id", $id)
            ->get();

            return response()->json($type);
         } 
         catch(\Exception $e){
            return response()->json($e->getMessage());
         }
        
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'emodele' => 'required|alphanum_spaces|max:32',
            'ehauteur' => 'required|alphanum_spaces|max:16',
            'elargeur' => 'required|alphanum_spaces|max:16',
            'epoids' => 'required|alphanum_spaces|max:16',
            'epuissance' => 'required|alphanum_spaces|max:8',
            'eprix_neuf' => 'required|numeric'
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
        //dd($request);

        $validator = Validator::make($request->all(), [
            'modele' => 'required|alphanum_spaces|max:32',
            'hauteur' => 'required|alphanum_spaces|max:16',
            'largeur' => 'required|alphanum_spaces|max:16',
            'poids' => 'required|alphanum_spaces|max:16',
            'puissance' => 'required|alphanum_spaces|max:8',
            'prix_neuf' => 'required|numeric'
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
        $typeVehicule->description = $request["description"];
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
