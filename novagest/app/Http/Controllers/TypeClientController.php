<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeClient;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class TypeClientController extends BasicController
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
        $typeclient = TypeClient::all();
        return view('typeclient', ['typeclient' => $typeclient]);
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
        //Validator

        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typeclients')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeClient = TypeClient::find($id);
        $typeClient->libelle = $request["elibelle"];
        $typeClient->save();

        return redirect('typeclients');
    }

    public function store(Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('typeclients')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new typeClient from request param
        $typeClient = new TypeClient;
        $typeClient->libelle = $request["libelle"];
        $typeClient->save();

        return redirect('typeclients');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $typeClient = TypeClient::find($id);
        $typeClient->desactive = 1;
        $typeClient->save();
        
        return redirect('typeclients');
    }
}
