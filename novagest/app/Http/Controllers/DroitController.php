<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Droit;
use DB;
use Input;

class DroitController extends Controller
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
            'elibelle' => 'required|max:32',
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
            'libelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
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
        // Delete record
        if ($droit != null) {
            $droit->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
