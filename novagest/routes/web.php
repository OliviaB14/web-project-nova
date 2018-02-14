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

// Routes avec controlleurs

Route::get('utilisateurs', 'UtilisateurController@index');/*
Route::get('todo2', 'todoController@index2');

Route::post('{id}', 'todoController@delete');
Route::post('todo2/add', 'todoController@ajouter');*/