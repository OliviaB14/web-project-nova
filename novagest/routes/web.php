<?php
Route::get('/', function () {
    return view('accueil');
});

Route::get('/login', function () {
    return view('/auth/login');
});

Route::get('/agence', function () {
    return view('agence');
});

Route::get('/vehicules', function () {
    return view('vehicules');
});

Route::get('/', 'AccueilController@index');

// Routes avec controlleurs

Route::get('villes', 'VilleController@GetVilles');
Route::get('utilisateurs', 'UtilisateurController@GetUtilisateurs');
Route::get('agence', 'AgenceController@index');

Route::resources([
    'agences' => 'AgenceController'
]);
