<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/bairro', 'App\Http\Controllers\BairroController@index');
Route::get('/municipio', 'App\Http\Controllers\MunicipioController@index');

