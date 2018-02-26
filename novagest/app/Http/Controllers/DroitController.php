<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Droit;
use DB;
use Input;

class DroitController extends Controller
{
	// public function GetDroits()
	// {
	// 	$droits = DB::table('Droit')
    //     ->get();
    //     //dd($droits);
	// 	return view('Droit', ['Droits' => $droits]);
	// }

	public function index()
    {
        $droit = Droit::all();
        return $this->sendResponse(true, null, $droit);
    }

    public function show($id)
    {
        $droit = Droit::find($id);
        if ($droit != null) {
            return $this->sendResponse(true, null, $droit);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $droit = Droit::find($id);
        // Populate data
        if ($droit != null) {
            $this->populateData($droit, $request);
            // Save
            $droit->save();
            return $this->sendResponse(true, null, $droit);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new Droit from request param
        $droit = new Droit;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $droit->save();
        return $this->sendResponse(true, null, $droit);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $droit = Droit::find($id);
        // Delete record
        if ($droit != null) {
            $droit->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
