<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BasicController;
use App\TypeEtatPiece;
use DB;
use Input;
use Illuminate\Support\Facades\Validator;

class TypeEtatPieceController extends BasicController
{
	// public function GetTypeEtatPieces()
	// {
	// 	$typeEtatPieces = DB::table('TypeEtatPiece')
    //     ->get();
    //     //dd($typeEtatPieces);
	// 	return view('TypeEtatPiece', ['TypeEtatPieces' => $typeEtatPieces]);
	// }

	public function index()
    {
        $typeetatpiece = TypeEtatPiece::all();
        return view('typeetatpiece', ['typeetatpiece' => $typeetatpiece]);
    }

    public function show($id)
    {
        $typeEtatPiece = TypeEtatPiece::find($id);
        if ($typeEtatPiece != null) {
            return $this->sendResponse(true, null, $typeEtatPiece);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        //Validator

        $validator = Validator::make($request->all(), [
            'elibelle' => 'required|alpha|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
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
        //Validator

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|alpha|max:32',
        ]);

        if ($validator->fails()) {
            //dd($validator);
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
