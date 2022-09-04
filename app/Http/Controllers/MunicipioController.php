<?php

namespace App\Http\Controllers;
use App\Models\{
    Municipio,
    Uf
};
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    private $uf;
    private $municipio;
    public function __construct(Uf $uf, Municipio $municipio)
    {
        $this->uf = $uf;
        $this->municipio = $municipio;

    }
    public function index(Request $request)
    {
        if(!$request->has('codigo_uf') && !$request->has('nome') && !$request->has('codigo_municipio')) {
            return Municipio::all();
        }
        return Municipio::where('codigo_uf', $request->codigo_uf)
            ->orWhere('nome', $request->nome)
            ->orWhere('codigo_municipio', $request->codigo_municipio)
            ->get();
    }
    public function show(int $municipio)
    {
        $data = Municipio::find($municipio);
        if($data === null){
            return response()->json(['message' => 'Nao existe este municipio'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        $municipio = $this->municipio->create($request->all());
        try {
            $municipio->save();
            return response()->json(['message' => 'Município cadastrado com sucesso!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Não foi possível cadastrar o município.'], 500);
        }
    }

    public function update(int $municipio, Request $request)
    {
        $data = Municipio::find($municipio);
        if($data === null){
            return response()->json(['message' => 'Nao existe este municipio'], 404);
        }else{
            $data->update($request->all());
            return response()->json(['message' => 'Município atualizado com sucesso!'], 200);
        }
    }

    public function destroy(Municipio $municipio)
    {
        $municipio->delete();
        return response()->json(['message' => 'Município excluído com sucesso!'], 200);
    }

}
