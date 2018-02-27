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

//Agence
Route::get('agences', 'AgenceController@index'); // index
Route::post('agence/add', 'AgenceController@store'); // add
Route::get('agences', 'AgenceController@index'); // show id
//Fin agence
Route::get('villes', 'VilleController@index');
Route::get('utilisateurs', 'UtilisateurController@index');
Route::get('agences', 'AgenceController@index');
Route::get('clients', 'ClientController@index');
Route::get('droits', 'DroitController@index');
Route::get('droittypeutilisateurs', 'DroitTypeUtilisateursController@index');
Route::get('historiquevehicule', 'HistoriqueVehiculeController@index');
Route::get('piecevehicule', 'PieceVehiculeController@index');
Route::get('statutvehicule', 'StatutVehiculeController@index');
Route::get('typeclient', 'TypeClientController@index');
Route::get('typeetatpiece', 'TypeEtatPieceController@index');
Route::get('typehistoriqueevenement', 'TypeHistoriqueEvenementController@index');
Route::get('typepiecevehicule', 'TypePieceVehiculeController@index');
Route::get('typeutilisateur', 'TypeUtilisateurController@index');
Route::get('typevehicule', 'TypeVehiculeController@index');
Route::get('vehicules', 'VehiculeController@index');

//authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
