<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeHistoriqueEvenement;
use DB;
use Input;

class TypeHistoriqueEvenementController extends Controller
{
	// public function GetTypeHistoriqueEvenements()
	// {
	// 	$typeHistoriqueEvenements = DB::table('TypeHistoriqueEvenement')
    //     ->get();
    //     //dd($typeHistoriqueEvenements);
	// 	return view('TypeHistoriqueEvenement', ['TypeHistoriqueEvenements' => $typeHistoriqueEvenements]);
	// }

	public function index()
    {
        $typeHistoriqueEvenements = TypeHistoriqueEvenement::all();
        return view('typeHistoriqueEvenement', ['typeHistoriqueEvenements' => $typeHistoriqueEvenements]);
    }

    public function show($id)
    {
        $typeHistoriqueEvenement = TypeHistoriqueEvenement::find($id);
        if ($typeHistoriqueEvenement != null) {
            return $this->sendResponse(true, null, $typeHistoriqueEvenement);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $typeHistoriqueEvenement = TypeHistoriqueEvenement::find($id);
        // Populate data
        if ($typeHistoriqueEvenement != null) {
            $this->populateData($typeHistoriqueEvenement, $request);
            // Save
            $typeHistoriqueEvenement->save();
            return $this->sendResponse(true, null, $typeHistoriqueEvenement);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new TypeHistoriqueEvenement from request param
        $typeHistoriqueEvenement = new TypeHistoriqueEvenement;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $typeHistoriqueEvenement->save();
        return $this->sendResponse(true, null, $typeHistoriqueEvenement);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $typeHistoriqueEvenement = TypeHistoriqueEvenement::find($id);
        // Delete record
        if ($typeHistoriqueEvenement != null) {
            $typeHistoriqueEvenement->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
