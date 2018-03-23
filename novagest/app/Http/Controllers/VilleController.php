<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Ville;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class VilleController extends BasicController
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
        //Validator

        $validator = Validator::make($request->all(), [
            'enom' => 'required|max:32',
            'ecode_postal' => 'required|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('villes')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $ville = Ville::find($id);
        $ville->nom = $request["enom"];
        $ville->code_postal = $request["ecode_postal"];
        $ville->save();

        return redirect('villes');
    }

    public function store(Request $request)
    {
        //Validator
        //dd($request);

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
        $ville->desactive = 1;
        $ville->save();
        
        return redirect('villes');
    }
}
