<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ville;
use DB;
use Input;

class VilleController extends Controller
{
	// public function GetVilles()
	// {
	// 	$villes = DB::table('ville')
    //     ->get();
    //     //dd($villes);
	// 	return view('ville', ['villes' => $villes]);
	// }

	public function index()
    {
        $villes = Ville::all(); 
        return view('ville', ['villes' => $villes]);
    }

    public function show($id)
    {
        $ville = Ville::find($id);
        if ($ville != null) {
            return $this->sendResponse(true, null, $ville);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $ville = Ville::find($id);
        // Populate data
        if ($ville != null) {
            $this->populateData($ville, $request);
            // Save
            $ville->save();
            return $this->sendResponse(true, null, $ville);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:32',
            'code_postal' => 'required|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('villes')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $ville = new Ville;
        $ville->nom = $request["nom"];
        $ville->code_postal = $request["code_postal"];
        $ville->save();

        return redirect('villes');
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $ville = Ville::find($id);
        // Delete record
        if ($ville != null) {
            $ville->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
