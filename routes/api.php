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
// Route::get('/uf', [UfController::class, 'index']);
// Route::post('/uf', [UfController::class, 'store']);
// Route::put('/uf', [UfController::class, 'update']);


Route::apiResource('/municipio', MunicipioController::class);
// Route::get('/municipio', [MunicipioController::class, 'index']);
// Route::post('/municipio', [MunicipioController::class, 'store']);
// Route::put('/municipio', [MunicipioController::class, 'update']);

Route::apiResource('/bairro', BairroController::class);
// Route::get('/bairro', [BairroController::class, 'index']);
// Route::post('/bairro', [BairroController::class, 'store']);
// Route::put('/bairro', [BairroController::class, 'update']);

Route::apiResource('/pessoa', PessoaController::class);
// Route::get('/pessoa', [PessoaController::class, 'index']);
// Route::post('/pessoa', [PessoaController::class, 'store']);
// Route::put('/pessoa', [PessoaController::class, 'update']);