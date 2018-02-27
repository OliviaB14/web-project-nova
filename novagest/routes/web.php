<?php
Route::get('/', function () {
    return view('accueil');
});

Route::get('/logintest', function () {
    return view('login');
});

Route::get('/', 'AccueilController@index');

// Routes avec controlleurs
Route::get('villes', 'VilleController@GetVilles');
Route::get('utilisateurs', 'UtilisateurController@GetUtilisateurs');
Route::get('agences', 'AgenceController@index');
Route::get('clients', 'ClientController@GetClients');
Route::get('droits', 'DroitController@GetDroits');
Route::get('droittypeutilisateurs', 'DroitTypeUtilisateurs@GetDroitTypeUtilisateurs');
Route::get('historiquevehicule', 'HistoriqueVehicule@GetHistoriqueVehicule');
Route::get('piecevehicule', 'PieceVehicule@GetPieceVehicule');
Route::get('statutvehicule', 'StatutVehicule@GetStatutVehicule');
Route::get('typeclient', 'TypeClient@TypeClient');
Route::get('typeetatpiece', 'TypeEtatPiece@TypeEtatPiece');
Route::get('typehistoriqueevenement', 'TypeHistoriqueEvenement@GetTypeHistoriqueEvenement');
Route::get('typepiecevehicule', 'TypePieceVehicule@GetTypePieceVehicule');
Route::get('typeutilisateur', 'TypeUtilisateur@GetTypeUtilisateur');
Route::get('typevehicule', 'TypeVehicule@GetTypeVehicule');
Route::get('vehicule', 'Vehicule@GetVehicule');

//vérifier utilité
Route::resources([
    'agences' => 'AgenceController'
]);
