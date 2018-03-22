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

        return view('statutvehicule', ['statutvehicule' => $statutvehicule]);
    }

    public function show($id)
    {
        $statutVehicule = StatutVehicule::find($id);
        if ($statutVehicule != null) {
            return $this->sendResponse(true, null, $statutVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $statutVehicule = StatutVehicule::find($id);
        // Populate data
        if ($statutVehicule != null) {
            $this->populateData($statutVehicule, $request);
            // Save
            $statutVehicule->save();
            return $this->sendResponse(true, null, $statutVehicule);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // // @TODO @Nathan please validate the data

        // // Create a new StatutVehicule from request param
        // $statutVehicule = new StatutVehicule;
        // // Populate data
        // $this->populateData($agence, $request);
        // // Save
        // $statutVehicule->save();
        // return $this->sendResponse(true, null, $statutVehicule);

                dd($request);

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
                // Populate data
                $this->populateData($statut, $request);
                // Save
                $statut->save();
                return redirect('statuts');
    }

    public function destroy($id)
    {
        // // Find the corresponding record
        // $statutVehicule = StatutVehicule::find($id);
        // // Delete record
        // if ($statutVehicule != null) {
        //     $statutVehicule->delete();
        //     return $this->sendResponse(true, null, null);
        // }
        // return $this->sendResponse(false, "Data not found.", null);


                // Find the corresponding record 
                $statut = StatutVehicule::find($id);
                $statut->desactive = 1;
                $statut->save();
                
                return redirect('statut');
    }
}
