<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeUtilisateur;
use DB;
use Input;

class TypeUtilisateurController extends Controller
{
	// public function GetTypeUtilisateurs()
	// {
	// 	$typeUtilisateurs = DB::table('TypeUtilisateur')
    //     ->get();
    //     //dd($typeUtilisateurs);
	// 	return view('TypeUtilisateur', ['TypeUtilisateurs' => $typeUtilisateurs]);
	// }

	public function index()
    {
        $typeUtilisateurs = TypeUtilisateur::all();
        return view('typeUtilisateur', ['typeUtilisateurs' => $typeUtilisateurs]);
    }

    public function show($id)
    {
        $typeUtilisateur = TypeUtilisateur::find($id);
        if ($typeUtilisateur != null) {
            return $this->sendResponse(true, null, $typeUtilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $typeUtilisateur = TypeUtilisateur::find($id);
        // Populate data
        if ($typeUtilisateur != null) {
            $this->populateData($typeUtilisateur, $request);
            // Save
            $typeUtilisateur->save();
            return $this->sendResponse(true, null, $typeUtilisateur);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new TypeUtilisateur from request param
        $typeUtilisateur = new TypeUtilisateur;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $typeUtilisateur->save();
        return $this->sendResponse(true, null, $typeUtilisateur);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $typeUtilisateur = TypeUtilisateur::find($id);
        // Delete record
        if ($typeUtilisateur != null) {
            $typeUtilisateur->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
