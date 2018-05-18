<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\Ville;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/Validators.php';   //regex customs


class VilleController extends BasicController
{
	// public function GetVilles()
	// {
	// 	$villes = DB::table('ville')
    //     ->get();
    //     //dd($villes);
	// 	return view('ville', ['villes' => $villes]);
	// }

	public function index()
    {
        $villes = Ville::all(); 
        return view('ville', ['villes' => $villes]);
    }

    public function show($id)
    {
        $ville = Ville::find($id);
        return response()->json($ville);
    }

    public function update($id, Request $request)
    {
        //Validator
        //dd($id);

        $validator = Validator::make($request->all(), [
            'enom' => 'required|alpha_spaces|max:32',
            'ecode_postal' => 'required|alphanum_spaces|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('villes')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $ville = Ville::find($id);
        $ville->nom = $request["enom"];
        $ville->code_postal = $request["ecode_postal"];
        $ville->save();

        return redirect('villes');
    }

    public function store(Request $request)
    {
        //Validator
        //dd($request);

        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_spaces|max:32',
            'code_postal' => 'required|alphanum_spaces|max:12',
        ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect('villes')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $ville = new Ville;
        $ville->nom = $request["nom"];
        $ville->code_postal = $request["code_postal"];
        $ville->save();

        return redirect('villes');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $ville = Ville::find($id);
        $ville->desactive = 1;
        $ville->save();
        
        return redirect('villes');
    }
}
