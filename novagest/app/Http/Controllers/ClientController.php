<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Client;
use App\Ville;
use App\TypeClient;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;



class ClientController extends BasicController
{

	public function index()
    {
        $clients = Client::all()->where('desactive' ,'==','0');
        $villes = Ville::pluck('nom','id');
        $typeclients = TypeClient::pluck('libelle','id');

        return view('clients', ['clients' => $clients, 'villes' => $villes, 'typeclients' => $typeclients]);
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
            'eidtypeclient' => 'required'
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('clients')
                        ->withErrors($validator)
                        ->withInput();
        }

        $client = Client::find($id);
        $client->raison_sociale = $request["eraison_sociale"];
        $client->adresse = $request["eadresse"];
        $client->idville = $request["eidville"];
        $client->telephone = $request["etelephone"];
        $client->fax = $request["efax"];
        $client->mail = $request["email"];
        $client->idtypeclient = $request["eidtypeclient"];
        
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
            'idtypeclient' => 'required|max:12'
        ]);

        if ($validator->fails()) {
            return redirect('clients')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new client from request param
        $client = new Client;
        $client->raison_sociale = $request["raison_sociale"];
        $client->adresse = $request["adresse"];
        $client->idville = $request["idville"];
        $client->telephone = $request["telephone"];
        $client->fax = $request["fax"];
        $client->mail = $request["mail"];
        $client->idtypeclient = $request["idtypeclient"];
        $client->save();
        return redirect('clients');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->desactive = 1;
        $client->save();

        return redirect('clients');
    }
}
