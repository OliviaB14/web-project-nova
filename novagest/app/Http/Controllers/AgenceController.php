<?php

namespace App\Http\Controllers;

use Auth;
use App\Agence;
use App\Ville;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

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
            'enom' => 'required|alpha_dash|max:64',
            'eadresse' => 'required|alpha_dash|max:256',
            'eidville' => 'required|integer',
            'etelephone' => 'required|alpha_dash|max:24',
            'efax' => 'required|alpha_dash|max:24',
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
            'nom' => 'required|alpha_dash|max:64',
            'adresse' => 'required|alpha_dash|max:256',
            'idville' => 'required|integer',
            'telephone' => 'required|alpha_dash|max:24',
            'fax' => 'required|alpha_dash|max:24',
            'mail' => 'required|email|max:64',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('agences')
                        ->withErrors($validator)
                        ->withInput();
        }

        // create a new image directly from Laravel file upload
        $img = Image::make($request['photo'])->encode('data-url');

        // Create a new agence from request param
        $agence = new Agence;
        $agence->nom = $request["nom"];
        $agence->adresse = $request["adresse"];
        $agence->idville = $request["idville"];
        $agence->telephone = $request["telephone"];
        $agence->fax = $request["fax"];
        $agence->mail = $request["mail"];
        $agence->photo = base64_encode($img);
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
