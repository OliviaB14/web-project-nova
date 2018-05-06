<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Input;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
	public function index()
    {
        $user = Auth::user();

        return view('profile', [
        	'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();  
        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        //Validator
        //dd($request["eidville"]);
        $validator = Validator::make($request->all(), [
            'eusername' => 'required|max:32',
            'etelephone' => 'required|max:24',
            'efax' => 'required|max:24',
            'email' => 'required|max:64'
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('profil')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $user = Utilisateur::find($id);

        $user->username = $request["eusername"];
        $user->telephone = $request["etelephone"];
        $user->fax = $request["efax"];
        $user->mail = $request["email"];

        $user->save();

        return redirect('profil');
    }

}