<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehicule;
use App\TypeVehicule;
use App\TypeEtatVehicule;
use App\StatutVehicule;
use App\Client;
use App\Agence;
use App\Ville;
use App\TypeHistoriqueEvenement;
use DB;
use Auth;
use Input;
use Illuminate\Support\Facades\Validator;
use App\HistoriqueVehicule;
use carbon\Carbon;  //extension dates
use Intervention\Image\ImageManagerStatic as Image;
require app_path().'/validators.php';   //regex customs


class VehiculeController extends BasicController
{
	public function index()
    {
        $vehicules = Vehicule::all();
        $typevehicule = TypeVehicule::all();

        $idtypevehicule = TypeVehicule::pluck('modele','id');
        $idtypeetatvehicule = TypeEtatVehicule::pluck('libelle','id');
        $idstatut = StatutVehicule::pluck('libelle','id');
        $idclient = Client::pluck('raison_sociale','id');
        $idagence = Agence::pluck('nom','id');
        return view('vehicule', ['vehicules' => $vehicules,'idclient' => $idclient,'idagence' => $idagence,'typevehicules' => $typevehicule,'idtypevehicule' => $idtypevehicule,'idtypeetatvehicule' => $idtypeetatvehicule,'idstatut' => $idstatut,]);
    }

    public function show($id)
    {
        $vehicule = Vehicule::find($id);  
        return response()->json($vehicule);
    }

    public function update($id, Request $request)
    {
        $user = Auth::user();
        //formattage des dates
        $request['edate_achat'] = Carbon::parse($request['edate_achat'])->format('Y-m-d');
        $request['edate_misecirculation'] = Carbon::parse($request['edate_misecirculation'])->format('Y-m-d');


        $validator = Validator::make($request->all(), [
            'eimmatriculation' => 'required|alpha_dash|max:16',
            'edate_achat' => 'required|date',
            'edate_misecirculation' => 'required|date',
            'eidtypevehicule' => 'required|integer',
            'eidtypeetatvehicule' => 'required|integer',
            'eidstatut' => 'required|integer',
            'eidclient' => 'required|integer',
            'eidagence' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect('vehicules')
                        ->withErrors($validator)
                        ->withInput();
        }

        
        // Find the corresponding record 
        $vehicule = Vehicule::find($id);
        $vehicule->immatriculation = $request["eimmatriculation"];
        $vehicule->date_achat = $request["edate_achat"];
        $vehicule->date_misecirculation = $request["edate_misecirculation"];
        $vehicule->idtypevehicule = $request["eidtypevehicule"];
        $vehicule->idtypeetatvehicule = $request["eidtypeetatvehicule"];
        $vehicule->idstatut = $request["eidstatut"];
        $vehicule->idclient = $request["eidclient"];
        $vehicule->idagence = $request["eidagence"];
        $vehicule->save();
        // create a new image directly from Laravel file upload
        if ($request->hasFile('ephotomain')) {
            $img = Image::make($request['ephotomain'])->encode('data-url');
            $vehicule->photo_1 = $img;
        }

        if ($request->hasFile('ephoto_2')) {
            $img2 = Image::make($request['ephoto_2'])->encode('data-url');
            $vehicule->photo_2 = $img2;
        }

        if ($request->hasFile('ephoto_3')) {
            $img3 = Image::make($request['ephoto_3'])->encode('data-url');
            $vehicule->photo_3 = $img3;
        }

        $vehicule->save();
        
        return redirect('vehicules');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        //formattage des dates
        $request['date_achat'] = Carbon::parse($request['date_achat'])->format('Y-m-d');
        $request['date_misecirculation'] = Carbon::parse($request['date_misecirculation'])->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'immatriculation' => 'required|alpha_dash|max:16',
            'date_achat' => 'required|date',
            'date_misecirculation' => 'required|date',
            'idtypevehicule' => 'required|integer',
            'idtypeetatvehicule' => 'required|integer',
            'idstatut' => 'required|integer',
            'idclient' => 'required|integer',
            'idagence' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            dd($validator);
            return redirect('vehicules')
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $vehicule = new Vehicule;
        $vehicule->immatriculation = $request["immatriculation"];
        $vehicule->date_achat = $request["date_achat"];
        $vehicule->date_misecirculation = $request["date_misecirculation"];
        $vehicule->idtypevehicule = $request["idtypevehicule"];
        $vehicule->idtypeetatvehicule = $request["idtypeetatvehicule"];
        $vehicule->idstatut = $request["idstatut"];
        $vehicule->idclient = $request["idclient"];
        // create a new image directly from Laravel file upload
        if ($request->hasFile('photo1')) {
            $img = Image::make($request['photo1'])->encode('data-url');
            $vehicule->photo_1 = $img;
        }

        if ($request->hasFile('photo2')) {
            $img2 = Image::make($request['photo2'])->encode('data-url');
            $vehicule->photo_2 = $img2;
        }

        if ($request->hasFile('photo3')) {
            $img3 = Image::make($request['photo3'])->encode('data-url');
            $vehicule->photo_3 = $img3;
        }
        $vehicule->idagence = $request["idagence"];
        $vehicule->save();

        
//TODO
        $id = DB::table('vehicule')->orderBy('id', 'DESC')->first();

        $histo = new HistoriqueVehicule;
        $histo->commentaire = "Add";
        $histo->idutilisateur = $user->id;
        $histo->idtypeevenement = 1;
        $histo->idvehicule = $id->id;
        $histo->desactive = 0;
        $histo->save();

        return redirect('vehicules');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        // Find the corresponding record 
        $vehicule = Vehicule::find($id);
        if($vehicule->desactive == 1)
        {
            $vehicule->desactive = 0;
            $vehicule->save();
        }
        else
        {

            $vehicule->desactive = 1;
            $vehicule->save();
        }

        $histo = new HistoriqueVehicule;
        $histo->commentaire = "Delete";
        $histo->idutilisateur = $user->id;
        $histo->idtypeevenement = 11;
        $histo->idvehicule = $id;
        $histo->desactive = 0;
        $histo->save();
        
        return redirect('vehicules');
    }

    public function GetSingle($id)
    {
        // Find the corresponding record
        $vehicule = Vehicule::find($id);
        //dd($vehicule);

        $agence = Agence::find($vehicule->idagence);
        $client = Client::find($vehicule->idclient);
        $type_vehicule = TypeVehicule::find($vehicule->idtypevehicule);
        $etatvehicule = TypeEtatVehicule::find($vehicule->idtypeetatvehicule);
        $idstatut = StatutVehicule::find($vehicule->idstatut);
        if($agence != null)
        {
            $ville = Ville::find($agence->idville);
            return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule,'agence' => $agence,'ville' => $ville, 'etatvehicule' => $etatvehicule, 'idstatut' => $idstatut]);
        }
        elseif($client != null)
        {
            $ville = Ville::find($client->idville);
            return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule,'client' => $client,'ville' => $ville, 'etatvehicule' => $etatvehicule, 'idstatut' => $idstatut]);
        }

        
        return view('singleVehicule', ['vehicule' => $vehicule,'type_vehicule' => $type_vehicule, 'etatvehicule' => $etatvehicule, 'idstatut' => $idstatut]);
    }
}
