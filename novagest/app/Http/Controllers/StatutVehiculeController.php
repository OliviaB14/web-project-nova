<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\StatutVehicule;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class StatutVehiculeController extends BasicController
{
	// public function GetStatutVehicules()
	// {
	// 	$statutVehicules = DB::table('StatutVehicule')
    //     ->get();
    //     //dd($statutVehicules);
	// 	return view('StatutVehicule', ['StatutVehicules' => $statutVehicules]);
	// }

	public function index()
    {
        $statutvehicule = StatutVehicule::all();

        //dd($statutvehicule);

        return view('statutvehicule', ['statutvehicule' => $statutvehicule]);
    }

    public function show($id)
    {
        var_dump($id);
        $statutvehicule = StatutVehicule::find($id);
        if ($statutvehicule != null) {
            return $this->sendResponse(true, null, $statutVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator
        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('statuts')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $statut = StatutVehicule::find($id);
        $statut->libelle = $request["elibelle"];
        $statut->save();

        return redirect('statuts');
    }

    public function store(Request $request)
    {
                //Validator
                $validator = Validator::make($request->all(), [
                    'libelle' => 'required|max:32',
                ]);
        
                if ($validator->fails()) {
                    //dd($validator);
                    return redirect('statuts')
                                ->withErrors($validator)
                                ->withInput();
                }
        
                // Create a new statut from request param
                $statut = new StatutVehicule;
                $statut->libelle = $request["libelle"];
                $statut->save();
                return redirect('statuts');
    }

    public function destroy($id)
    {
                // Find the corresponding record 
                $statut = StatutVehicule::find($id);
                $statut->desactive = 1;
                $statut->save();
                
                return redirect('statuts');
    }
}
