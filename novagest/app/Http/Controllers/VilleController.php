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
        // @TODO @Nathan please validate the data

        // Create a new ville from request param
        $ville = new Ville;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $ville->save();
        return $this->sendResponse(true, null, $ville);
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
