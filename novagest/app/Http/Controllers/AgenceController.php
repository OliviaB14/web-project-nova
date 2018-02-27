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
        //$villes = Ville::orderBy('id')->pluck('nom', 'id');
        //$villes = DB::table('ville')->get();
        $villes = Ville::pluck('nom','id')->all();
        //dd($villes);
        return view('agence', ['agences' => $agences,'villes' => $villes]);
    }

    public function show($id)
    {
        $agence = Agence::find($id);
        if ($agence != null) {
            return $this->sendResponse(true, null, $agence);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $agence = Agence::find($id);
        // Populate data
        if ($agence != null) {
            $this->populateData($agence, $request);
            // Save
            $agence->save();
            return $this->sendResponse(true, null, $agence);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        //Validator
dd($request);
        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:64',
            'adresse' => 'required|max:256',
            'code_postal' => 'required|max:12',
            'idville' => 'required',
            'telephone' => 'required|max:24',
            'fax' => 'required|max:24',
            'mail' => 'required|email|max:64'
        ]);

        if ($validator->fails()) {
            dd($validator);
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
        return $this->sendResponse(true, null, $agence);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $agence = Agence::find($id);
        // Delete record
        if ($agence != null) {
            $agence->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
