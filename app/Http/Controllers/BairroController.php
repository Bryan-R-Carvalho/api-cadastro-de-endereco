<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Bairro,
    Municipio
};

class BairroController extends Controller
{
    private $bairro;
    public function __construct(Bairro $bairro)
    {
        $this->bairro = $bairro;
    }
    public function index(Request $request)
    {
        if(!$request->has('nome') && !$request->has('codigo_bairro') && !$request->has('codigo_municipio')) {
            return Bairro::all();
        }
        return Bairro::where('nome', $request->nome)
            ->orWhere('codigo_bairro', $request->codigo_bairro)
            ->orWhere('codigo_municipio', $request->codigo_municipio)
            ->get();
    }
    public function show(int $bairro)
    {
        $data = Bairro::find($bairro);
        if($data === null){
            return response()->json(['message' => 'Nao existe este bairro'], 404);
        }else{
            return response()->json($data);
        }
    }
    public function store(Request $request)
    {
        $bairro = $this->bairro->create($request->all());
        try {
            $bairro->save();
            return response()->json(['message' => 'Bairro cadastrado com sucesso!'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Não foi possível cadastrar o bairro.', 'status' => '500'], 500);
        }
    }
    public function update(Request $request, int $bairro)
    {
        $data = Bairro::find($bairro);
        if($data === null){
            return response()->json(['message' => 'Nao existe este bairro'], 404);
        }else{
            $data->update($request->all());
            return response()->json(['message' => 'Bairro atualizado com sucesso!'], 200);
        }
    }
    public function destroy(int $bairro)
    {
        $data = Bairro::find($bairro);
        if($data === null){
            return response()->json(['message' => 'Nao existe este bairro'], 404);
        }else{
            $data->delete();
            return response()->json(['message' => 'Bairro excluído com sucesso!'], 200);
        }
    }
}
