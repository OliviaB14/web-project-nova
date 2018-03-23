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
        //Validator

        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typehistoriqueevenements')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeHistoriqueEvenement = TypeHistoriqueEvenement::find($id);
        $typeHistoriqueEvenement->libelle = $request["elibelle"];
        $typeHistoriqueEvenement->save();

        return redirect('typehistoriqueevenements');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typehistoriqueevenements')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typeHistoriqueEvenement from request param
        $typeHistoriqueEvenement = new TypeHistoriqueEvenement;
        $typeHistoriqueEvenement->libelle = $request["libelle"];
        $typeHistoriqueEvenement->save();

        return redirect('typehistoriqueevenements');
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
