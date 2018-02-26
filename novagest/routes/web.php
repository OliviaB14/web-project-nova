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
Route::get('agences', 'AgenceController@index');

Route::resources([
    'agences' => 'AgenceController'
]);
