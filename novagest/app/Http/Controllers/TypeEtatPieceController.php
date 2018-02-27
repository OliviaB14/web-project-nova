<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeEtatPiece;
use DB;
use Input;

class TypeEtatPieceController extends Controller
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
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $typeEtatPiece = TypeEtatPiece::find($id);
        // Populate data
        if ($typeEtatPiece != null) {
            $this->populateData($typeEtatPiece, $request);
            // Save
            $typeEtatPiece->save();
            return $this->sendResponse(true, null, $typeEtatPiece);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new TypeEtatPiece from request param
        $typeEtatPiece = new TypeEtatPiece;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $typeEtatPiece->save();
        return $this->sendResponse(true, null, $typeEtatPiece);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $typeEtatPiece = TypeEtatPiece::find($id);
        // Delete record
        if ($typeEtatPiece != null) {
            $typeEtatPiece->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
