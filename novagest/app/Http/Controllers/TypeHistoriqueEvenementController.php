<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeHistoriqueEvenement;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class TypeHistoriqueEvenementController extends BasicController
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
            'elibelle' => 'required|alpha|max:32',
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
            'libelle' => 'required|alpha|max:32',
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
        $typeHistoriqueEvenement->desactive = 1;
        $typeHistoriqueEvenement->save();
        
        return redirect('typehistoriqueevenements');
    }
}
