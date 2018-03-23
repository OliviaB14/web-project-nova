<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilisateur;
use Input;


class ProfileController extends Controller
{
	public function index()
    {
        $user = Auth::user();

        return view('profile', [
        	'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        //Validator
        //dd($request["eidville"]);
        $validator = Validator::make($request->all(), [
            'enom' => 'max:32',
            'eprenom' => 'max:32',
            'epseudo' => 'max:32',
            'etelephone' => 'max:24',
            'efax' => 'max:24',
        ]);

        if ($validator->fails()) {
            dd($validator);
            
            return redirect('profil/parametres')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find the corresponding record 
        $user = Utilisateur::find($id);

        $user->nom = $this->updated($request["enom"], $user->nom);
        $user->prenom = $this->updated($request["eprenom"], $user->prenom);
        $user->username = $this->updated($request["epseudo"], $user->username);
        $user->telephone = $this->updated($request["etelephone"], $user->telephone);
        $user->fax = $this->updated($request["efax"], $user->fax);

        $user->save();

        return redirect('profil/parametres');
    }

    public function updated($new, $old){
    	if(($new != null)&&($new != $old)){
    		return $new;
    	} else { return $old; }
    }

}