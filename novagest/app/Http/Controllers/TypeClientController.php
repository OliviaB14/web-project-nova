<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeClient;
use DB;
use Input;

class TypeClientController extends Controller
{
	// public function GetTypeClients()
	// {
	// 	$typeClients = DB::table('TypeClient')
    //     ->get();
    //     //dd($typeClients);
	// 	return view('TypeClient', ['TypeClients' => $typeClients]);
	// }

	public function index()
    {
        $typeClient = TypeClient::all();
        return $this->sendResponse(true, null, $typeClient);
    }

    public function show($id)
    {
        $typeClient = TypeClient::find($id);
        if ($typeClient != null) {
            return $this->sendResponse(true, null, $typeClient);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $typeClient = TypeClient::find($id);
        // Populate data
        if ($typeClient != null) {
            $this->populateData($typeClient, $request);
            // Save
            $typeClient->save();
            return $this->sendResponse(true, null, $typeClient);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new TypeClient from request param
        $typeClient = new TypeClient;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $typeClient->save();
        return $this->sendResponse(true, null, $typeClient);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $typeClient = TypeClient::find($id);
        // Delete record
        if ($typeClient != null) {
            $typeClient->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
