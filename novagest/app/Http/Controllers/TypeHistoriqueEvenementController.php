<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeHistoriqueEvenement;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/validators.php';   //regex customs


class TypeHistoriqueEvenementController extends BasicController
{

    public function index()
    {
        $typeHistoriqueEvenements = TypeHistoriqueEvenement::all();
        return view('typeHistoriqueEvenement', ['typeHistoriqueEvenements' => $typeHistoriqueEvenements]);
    }

    public function show($id)
    {
        $typeHistoriqueEvenement = TypeHistoriqueEvenement::find($id);  
        return response()->json($typeHistoriqueEvenement);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {

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
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {

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
