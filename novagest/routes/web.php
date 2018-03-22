<?php
// Routes avec controlleurs
Route::get('/','AccueilController@index');
Route::get('villes', 'VilleController@GetVilles');
Route::get('utilisateur', 'UtilisateurController@GetUtilisateurs');

//Agence
Route::get('agences', 'AgenceController@index'); // index
Route::post('agence/add', 'AgenceController@store'); // add
Route::get('agences', 'AgenceController@index'); // show id
Route::get('agence/destroy/{id}', 'AgenceController@destroy');
Route::get('agences/show/{id}', 'AgenceController@show'); // index
Route::post('agence/update/{id}', 'AgenceController@update');
//Fin agence

//Clients
Route::get('clients', 'ClientController@index'); // index
Route::post('client/add', 'ClientController@store'); // add
Route::get('clients', 'ClientController@index'); // show id
Route::get('client/destroy/{id}', 'ClientController@destroy');
Route::get('clients/show/{id}', 'ClientController@show'); // index
Route::post('client/update/{id}', 'ClientController@update');
//Fin clients

//Status
Route::get('statut', 'StatutVehiculeController@index'); // index
Route::post('client/add', 'ClientController@store'); // add
Route::get('clients', 'ClientController@index'); // show id
Route::get('client/destroy/{id}', 'ClientController@destroy');
Route::get('clients/show/{id}', 'ClientController@show'); // index
Route::post('client/update/{id}', 'ClientController@update');
//Fin Status

Route::get('villes', 'VilleController@index');
Route::get('utilisateur', 'UtilisateurController@index');
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
Route::get('vehicule', 'VehiculeController@index');
Route::get('lieux', 'VilleController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profil', 'ProfileController@index')->name('profile'); 

