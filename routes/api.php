<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PessoaController,
    MunicipioController,
    BairroController,
    UfController
};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/uf', UfController::class);

Route::apiResource('/municipio', MunicipioController::class);

Route::apiResource('/bairro', BairroController::class);

Route::apiResource('/pessoa', PessoaController::class);
