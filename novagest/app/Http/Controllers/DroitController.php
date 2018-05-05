<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Droit;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/validators.php';   //regex customs


class DroitController extends BasicController
{
	// public function GetDroits()
	// {
	// 	$droits = DB::table('Droit')
    //     ->get();
    //     //dd($droits);
	// 	return view('Droit', ['Droits' => $droits]);
	// }

	public function index()
    {
        $droits = Droit::all();
        return view('droit', ['droits' => $droits]);
    }

    public function show($id)
    {
        $droit = Droit::find($id);
        if ($droit != null) {
            return $this->sendResponse(true, null, $droit);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('droits')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $droit = Droit::find($id);
        $droit->libelle = $request["elibelle"];
        $droit->save();

        return redirect('droits');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha_spaces|max:64',
        ]);

        if ($validator->fails()) {
            dd($validator);
            return redirect('droits')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $droit = new Droit;
        $droit->libelle = $request["libelle"];
        $droit->save();

        return redirect('droits');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $droit = Droit::find($id);
        $droit->desactive = 1;
        $droit->save();
        
        return redirect('droits');
    }
}
