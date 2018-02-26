<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/agence', function () {
    return view('agence');
});

Route::get('/vehicules', function () {
    return view('vehicules');
});


// Routes avec controlleurs

Route::get('villes', 'VilleController@GetVilles');
Route::get('utilisateurs', 'UtilisateurController@GetUtilisateurs');
Route::get('agence', 'AgenceController@index');

Route::resources([
    'agences' => 'AgenceController'
]);

/*
Route::post('{id}', 'todoController@delete');
Route::post('todo2/add', 'todoController@ajouter');*/