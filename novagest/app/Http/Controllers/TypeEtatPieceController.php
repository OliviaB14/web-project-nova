<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeEtatPiece;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;
require app_path().'/Validators.php';   //regex customs


class TypeEtatPieceController extends BasicController
{

	public function index()
    {
        $typeetatpiece = TypeEtatPiece::all();
        return view('typeetatpiece', ['typeetatpiece' => $typeetatpiece]);
    }

    public function show($id)
    {
        $typeetatpiece = TypeEtatPiece::find($id);  
        return response()->json($typeetatpiece);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {

            return redirect('typeetatpieces')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $typeEtatPiece = TypeEtatPiece::find($id);
        $typeEtatPiece->libelle = $request["elibelle"];
        $typeEtatPiece->save();

        return redirect('typeetatpieces');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha_spaces|max:32',
        ]);

        if ($validator->fails()) {

            return redirect('typeetatpieces')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create a new agence from request param
        $typeEtatPiece = new TypeEtatPiece;
        $typeEtatPiece->libelle = $request["libelle"];
        $typeEtatPiece->save();

        return redirect('typeetatpieces');
    }

    public function destroy($id)
    {
        // Find the corresponding record 
        $typeEtatPiece = TypeEtatPiece::find($id);
        $typeEtatPiece->desactive = 1;
        $typeEtatPiece->save();
        
        return redirect('typeetatpieces');
    }
}
