<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use DB;
use Input;

class ClientController extends Controller
{
	// public function GetClients()
	// {
	// 	$clients = DB::table('Client')
    //     ->get();
    //     //dd($clients);
	// 	return view('Client', ['Clients' => $clients]);
	// }

	public function index()
    {
        $clients = Client::all();
        $villes = Ville::orderBy('id')->pluck('nom', 'id');
        return view('client', ['clients' => $clients, 'villes' => $villes]);
    }

    public function show($id)
    {
        $client = Client::find($id);
        if ($client != null) {
            return $this->sendResponse(true, null, $client);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $client = Client::find($id);
        // Populate data
        if ($client != null) {
            $this->populateData($client, $request);
            // Save
            $client->save();
            return $this->sendResponse(true, null, $client);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new Client from request param
        $client = new Client;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $client->save();
        return $this->sendResponse(true, null, $client);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $client = Client::find($id);
        // Delete record
        if ($client != null) {
            $client->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
