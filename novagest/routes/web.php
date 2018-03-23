<?php
Route::get('logout','BasicController@Logout');
Route::post('test','BasicController@Login');

// Routes avec controlleurs
Route::get('/','AccueilController@index');
Route::get('villes', 'VilleController@GetVilles');
Route::get('utilisateur', 'UtilisateurController@GetUtilisateurs');

//Agences
Route::get('agences', 'AgenceController@index'); // index
Route::post('agence/add', 'AgenceController@store'); // add
Route::get('agences', 'AgenceController@index'); // show id
Route::get('agence/destroy/{id}', 'AgenceController@destroy');
Route::get('agences/show/{id}', 'AgenceController@show'); // index
Route::post('agence/update/{id}', 'AgenceController@update');
//Fin Agences

//Vehicules
Route::get('vehicules', 'VehiculeController@index'); // index
Route::post('vehicule/add', 'VehiculeController@store'); // add
Route::get('vehicules', 'VehiculeController@index'); // show id
Route::get('vehicule/destroy/{id}', 'VehiculeController@destroy');
Route::get('vehicule/show/{id}', 'VehiculeController@show'); // index
Route::post('vehicule/update/{id}', 'VehiculeController@update');
Route::Get('single/{id}','VehiculeController@GetSingle');
//Fin Vehicules

//Clients
Route::get('clients', 'ClientController@index'); // index
Route::post('client/add', 'ClientController@store'); // add
Route::get('clients', 'ClientController@index'); // show id
Route::get('client/destroy/{id}', 'ClientController@destroy');
Route::get('clients/show/{id}', 'ClientController@show'); // index
Route::post('client/update/{id}', 'ClientController@update');
//Fin clients

//Statuts
Route::get('statuts', 'StatutVehiculeController@index'); // index
Route::post('statut/add', 'StatutVehiculeController@store'); // add
Route::get('statuts', 'StatutVehiculeController@index'); // show id
Route::get('statut/destroy/{id}', 'StatutVehiculeController@destroy');
Route::get('statuts/show/{id}', 'StatutVehiculeController@show'); // index
Route::post('statut/update/{id}', 'StatutVehiculeController@update');
//Fin Status

//ville
Route::get('villes', 'VilleVehiculeController@index'); // index
Route::post('ville/add', 'VilleVehiculeController@store'); // add
Route::get('villes', 'VilleVehiculeController@index'); // show id
Route::get('ville/destroy/{id}', 'VilleVehiculeController@destroy');
Route::get('villes/show/{id}', 'VilleVehiculeController@show'); // index
Route::post('ville/update/{id}', 'VilleVehiculeController@update');
//Fin ville

//utilisateur
Route::get('utilisateurs', 'UtilisateurVehiculeController@index'); // index
Route::post('utilisateur/add', 'UtilisateurVehiculeController@store'); // add
Route::get('utilisateurs', 'UtilisateurVehiculeController@index'); // show id
Route::get('utilisateur/destroy/{id}', 'UtilisateurVehiculeController@destroy');
Route::get('utilisateurs/show/{id}', 'UtilisateurVehiculeController@show'); // index
Route::post('utilisateur/update/{id}', 'UtilisateurVehiculeController@update');
//Fin utilisateur

//droit
Route::get('droits', 'DroitVehiculeController@index'); // index
Route::post('droit/add', 'DroitVehiculeController@store'); // add
Route::get('droits', 'DroitVehiculeController@index'); // show id
Route::get('droit/destroy/{id}', 'DroitVehiculeController@destroy');
Route::get('droits/show/{id}', 'DroitVehiculeController@show'); // index
Route::post('droit/update/{id}', 'DroitVehiculeController@update');
//Fin droit

//DroitTypeUtilisateur
Route::get('droittypeutilisateurs', 'DroitTypeUtilisateurController@index'); // index
Route::post('droittypeutilisateur/add', 'DroitTypeUtilisateurController@store'); // add
Route::get('droittypeutilisateurs', 'DroitTypeUtilisateurController@index'); // show id
Route::get('droittypeutilisateur/destroy/{id}', 'DroitTypeUtilisateurController@destroy');
Route::get('droittypeutilisateurs/show/{id}', 'DroitTypeUtilisateurController@show'); // index
Route::post('droittypeutilisateur/update/{id}', 'DroitTypeUtilisateurController@update');
//Fin DroitTypeUtilisateur

//HistoriqueVehicule
Route::get('historiquevehicules', 'HistoriqueVehiculeController@index'); // index
Route::post('historiquevehicule/add', 'HistoriqueVehiculeController@store'); // add
Route::get('historiquevehicules', 'HistoriqueVehiculeController@index'); // show id
Route::get('historiquevehicule/destroy/{id}', 'HistoriqueVehiculeController@destroy');
Route::get('historiquevehicules/show/{id}', 'HistoriqueVehiculeController@show'); // index
Route::post('historiquevehicule/update/{id}', 'HistoriqueVehiculeController@update');
//Fin HistoriqueVehicule

//PieceVehicule
Route::get('piecevehicules', 'PieceVehiculeController@index'); // index
Route::post('piecevehicule/add', 'PieceVehiculeController@store'); // add
Route::get('piecevehicules', 'PieceVehiculeController@index'); // show id
Route::get('piecevehicule/destroy/{id}', 'PieceVehiculeController@destroy');
Route::get('piecevehicules/show/{id}', 'PieceVehiculeController@show'); // index
Route::post('piecevehicule/update/{id}', 'PieceVehiculeController@update');
//Fin PieceVehicule

//TypeClient
Route::get('typeclients', 'TypeClientController@index'); // index
Route::post('typeclient/add', 'TypeClientController@store'); // add
Route::get('typeclients', 'TypeClientController@index'); // show id
Route::get('typeclient/destroy/{id}', 'TypeClientController@destroy');
Route::get('typeclients/show/{id}', 'TypeClientController@show'); // index
Route::post('typeclient/update/{id}', 'TypeClientController@update');
//Fin TypeClient

//TypeEtatPiece
Route::get('typeetatpieces', 'TypeEtatPieceController@index'); // index
Route::post('typeetatpiece/add', 'TypeEtatPieceController@store'); // add
Route::get('typeetatpieces', 'TypeEtatPieceController@index'); // show id
Route::get('typeetatpiece/destroy/{id}', 'TypeEtatPieceController@destroy');
Route::get('typeetatpieces/show/{id}', 'TypeEtatPieceController@show'); // index
Route::post('typeetatpiece/update/{id}', 'TypeEtatPieceController@update');
//Fin TypeEtatPiece

//TypeHistoriqueEvenement
Route::get('typehistoriqueevenements', 'TypeHistoriqueEvenementController@index'); // index
Route::post('typehistoriqueevenement/add', 'TypeHistoriqueEvenementController@store'); // add
Route::get('typehistoriqueevenements', 'TypeHistoriqueEvenementController@index'); // show id
Route::get('typehistoriqueevenement/destroy/{id}', 'TypeHistoriqueEvenementController@destroy');
Route::get('typehistoriqueevenements/show/{id}', 'TypeHistoriqueEvenementController@show'); // index
Route::post('typehistoriqueevenement/update/{id}', 'TypeHistoriqueEvenementController@update');
//Fin TypeHistoriqueEvenement

//typepiecevehicule
Route::get('typepiecevehicules', 'TypePieceVehiculeController@index'); // index
Route::post('typepiecevehicule/add', 'TypePieceVehiculeController@store'); // add
Route::get('typepiecevehicules', 'TypePieceVehiculeController@index'); // show id
Route::get('typepiecevehicule/destroy/{id}', 'TypePieceVehiculeController@destroy');
Route::get('typepiecevehicules/show/{id}', 'TypePieceVehiculeController@show'); // index
Route::post('typepiecevehicule/update/{id}', 'TypePieceVehiculeController@update');
//Fin typepiecevehicule

//typeutilisateur
Route::get('typeutilisateurs', 'TypeUtilisateurController@index'); // index
Route::post('typeutilisateur/add', 'TypeUtilisateurController@store'); // add
Route::get('typeutilisateurs', 'TypeUtilisateurController@index'); // show id
Route::get('typeutilisateur/destroy/{id}', 'TypeUtilisateurController@destroy');
Route::get('typeutilisateurs/show/{id}', 'TypeUtilisateurController@show'); // index
Route::post('typeutilisateur/update/{id}', 'TypeUtilisateurController@update');
//Fin typeutilisateur

//typevehicule
Route::get('typevehicules', 'TypeVehiculeController@index'); // index
Route::post('typevehicule/add', 'TypeVehiculeController@store'); // add
Route::get('typevehicules', 'TypeVehiculeController@index'); // show id
Route::get('typevehicule/destroy/{id}', 'TypeVehiculeController@destroy');
Route::get('typevehicules/show/{id}', 'TypeVehiculeController@show'); // index
Route::post('typevehicule/update/{id}', 'TypeVehiculeController@update');
//Fin typevehicule


//authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('lieux', 'VilleController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profil', 'ProfileController@index')->name('profile'); 
Route::get('profil/parametres', 'ProfileController@update')->name('profile');
