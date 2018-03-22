<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Ville;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AgenceController extends BasicController
{
    public function index()
    {
        $agences = Agence::all();
        $villes = Ville::pluck('nom','id');
        return view('agence', ['agences' => $agences,'villes' => $villes]);
    }

    public function show($id)
    {
        $agence = Agence::find($id);
  
        return response()->json($agence);
    }

    public function update($id, Request $request)
    {
        //Validator
        //dd($request["eidville"]);
        $validator = Validator::make($request->all(), [
            'enom' => 'required|max:64',
            'eadresse' => 'required|max:256',
            'eidville' => 'required',
            'etelephone' => 'required|max:24',
            'efax' => 'required|max:24',
            'email' => 'required|email|max:64'
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('agences')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $agence = Agence::find($id);
        $agence->nom = $request["enom"];
        $agence->adresse = $request["eadresse"];
        $agence->idville = $request["eidville"];
        $agence->telephone = $request["etelephone"];
        $agence->fax = $request["efax"];
        $agence->mail = $request["email"];
        $agence->save();

        return redirect('agences');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:64',
            'adresse' => 'required|max:256',
            'idville' => 'required',
            'telephone' => 'required|max:24',
            'fax' => 'required|max:24',
            'mail' => 'required|email|max:64'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('agences')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $agence = new Agence;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $agence->save();
        return redirect('agences');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $agence = Agence::find($id);
        $agence->desactive = 1;
        $agence->save();
        
        return redirect('agences');
    }
}
