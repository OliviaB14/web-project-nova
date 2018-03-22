<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Ville;
use App\TypeClient;
use DB;
use Input;

class ClientController extends Controller
{

	public function index()
    {
        $clients = Client::all()->where('status' ,'==','0');
        $villes = Ville::pluck('nom','id');
        $typeclients = TypeClient::pluck('libelle','id');
        return view('client', ['clients' => $clients, 'villes' => $villes, 'typeclients' => $typeclients]);
    }

    public function show($id)
    {
        $client = Client::find($id);  
        return response()->json($client);
    }

    public function update($id, Request $request)
    {
        //Validator
        //dd($request);
        $validator = Validator::make($request->all(), [
            'eraison_sociale' => 'required|max:64',
            'eadresse' => 'required|max:256',
            'eidville' => 'required',
            'etelephone' => 'required|max:24',
            'efax' => 'required|max:24',
            'email' => 'required|email|max:64',
            'eidtype' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('clients')
                        ->withErrors($validator)
                        ->withInput();
        }

        $client = Client::find($id);
        $client->nom = $request["eraison_sociale"];
        $client->adresse = $request["eadresse"];
        $client->idville = $request["eidville"];
        $client->telephone = $request["etelephone"];
        $client->fax = $request["efax"];
        $client->mail = $request["email"];
        $client->idtype = $request["eidtype"];
        $client->save();

        return redirect('clients');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'raison_sociale' => 'required|max:64',
            'adresse' => 'required|max:256',
            'idville' => 'required',
            'telephone' => 'required|max:24',
            'fax' => 'required|max:24',
            'mail' => 'required|email|max:64',
            'idtype' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('agences')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new client from request param
        $client = new Client;
        // Populate data
        $this->populateData($client, $request);
        // Save
        $client->save();
        return redirect('clients');
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $client = Client::find($id);
        // Delete record
        if ($client != null) {
            $client->delete();
            return redirect('clients');
        }
        return redirect('clients');
    }
}
