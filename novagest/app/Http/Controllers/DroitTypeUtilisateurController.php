<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DroitTypeUtilisateur;
use DB;
use Input;

class DroitTypeUtilisateurController extends Controller
{
	// public function GetDroitTypeUtilisateurs()
	// {
	// 	$droitTypeUtilisateurs = DB::table('DroitTypeUtilisateur')
    //     ->get();
    //     //dd($droitTypeUtilisateurs);
	// 	return view('DroitTypeUtilisateur', ['DroitTypeUtilisateurs' => $droitTypeUtilisateurs]);
	// }

	public function index()
    {
        $droitTypeUtilisateurs = DroitTypeUtilisateur::all();
        return view('droittypeutilisateur', ['droitTypeUtilisateurs' => $droitTypeUtilisateurs]);
    }

    public function show($id)
    {
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        if ($droitTypeUtilisateur != null) {
            return $this->sendResponse(true, null, $droitTypeUtilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        // Populate data
        if ($droitTypeUtilisateur != null) {
            $this->populateData($droitTypeUtilisateur, $request);
            // Save
            $droitTypeUtilisateur->save();
            return $this->sendResponse(true, null, $droitTypeUtilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new DroitTypeUtilisateur from request param
        $droitTypeUtilisateur = new DroitTypeUtilisateur;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $droitTypeUtilisateur->save();
        return $this->sendResponse(true, null, $droitTypeUtilisateur);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $droitTypeUtilisateur = DroitTypeUtilisateur::find($id);
        // Delete record
        if ($droitTypeUtilisateur != null) {
            $droitTypeUtilisateur->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
