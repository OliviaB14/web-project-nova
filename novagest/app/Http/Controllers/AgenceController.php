<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;

class AgenceController extends BasicController
{
    public function index()
    {
        $agences = Agence::all();
        return view('agence', ['agences' => $agences]);
    }

    public function show($id)
    {
        $agence = Agence::find($id);
        if ($agence != null) {
            return $this->sendResponse(true, null, $agence);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function update($id, Request $request)
    {
        // @TODO @Nathan please validate the data

        // Find the corresponding record
        $agence = Agence::find($id);
        // Populate data
        if ($agence != null) {
            $this->populateData($agence, $request);
            // Save
            $agence->save();
            return $this->sendResponse(true, null, $agence);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }

    public function store(Request $request)
    {
        // @TODO @Nathan please validate the data

        // Create a new agence from request param
        $agence = new Agence;
        // Populate data
        $this->populateData($agence, $request);
        // Save
        $agence->save();
        return $this->sendResponse(true, null, $agence);
    }

    public function destroy($id)
    {
        // Find the corresponding record
        $agence = Agence::find($id);
        // Delete record
        if ($agence != null) {
            $agence->delete();
            return $this->sendResponse(true, null, null);
        }
        return $this->sendResponse(false, "Data not found.", null);
    }
}
