<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypePieceVehicule;
use App\TypeVehicule;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/Validators.php';   //regex customs


class TypePieceVehiculeController extends BasicController
{

    public function index()
    {
        $typePieceVehicules = TypePieceVehicule::all();
        $typevehicules = TypeVehicule::pluck('modele','id');
        return view('typePieceVehicule', ['typePieceVehicules' => $typePieceVehicules, 'typevehicules' => $typevehicules]);
    }

    public function show($id)
    {
        $typePieceVehicule = TypePieceVehicule::find($id);  
        return response()->json($typePieceVehicule);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'enom' => 'required|alphanum_spaces|max:32',
            'eidtypevehicule' => 'required|integer',
            'eprix_neuf' => 'required|numeric',
        ]);

        if ($validator->fails()) {

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
        $validator = Validator::make($request->all(), [
            'nom' => 'required|alphanum_spaces|max:32',
            'idtypevehicule' => 'required|integer',
            'prix_neuf' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {

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
        $typePieceVehicule = TypePieceVehicule::find($id);
        $typePieceVehicule->desactive = 1;
        $typePieceVehicule->save();
        
        return redirect('typepiecevehicules');
    }
}
