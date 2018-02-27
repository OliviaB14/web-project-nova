<?php
Route::get('/', function () {
    return view('accueil');
});

Route::get('/logintest', function () {
    return view('login');
});

Route::get('/agences', function () {
    return view('agence');
});

Route::get('/vehicules', function () {
    return view('vehicules');
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

Route::resources([
    'agences' => 'AgenceController'
]);
