<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;
use App\Http\Requests\UfRequest;


class UfController extends Controller
{

    private $model;
    public function __construct(Uf $uf)
    {
        $this->model = $uf;
    }

    public function index(Request $request)
    {
        if(!$request->has('sigla_uf') && !$request->has('nome') && !$request->has('codigo_uf')) {
            return Uf::all();
        }
        return Uf::where('sigla_uf', $request->sigla_uf)
            ->orWhere('nome', $request->nome)
            ->orWhere('codigo_uf', $request->codigo_uf)
            ->get();
    }

    public function show(int $uf)
    {
        $data = Uf::find($uf);
        if($data === null){
            return response()->json(['message' => 'Nao existe este UF'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function store(UfRequest $request)
    {
        try{
            if($this->model::where('sigla_uf', $request->sigla_uf)->exists()){
                return response()->json(['mensagem' => 'Esta UF ja existe', 'status' => '400'], 400);
            }
        
        $this->model::create($request->all());
        return response()->json(['mensagem' => 'UF cadastrada com sucesso!'], 201);

        }catch(\Exception $e){
            return response()->json(['mensagem' => 'Erro ao cadastrar UF','status' => '500'], 500);
        }
    }

    public function update(int $uf, Request $request)
    {
        $data = Uf::find($uf);
        if($data === null){
            return response()->json(['mensagem' => 'Nao existe este UF'], 404);
        }else{
            $data->update($request->all());
            return response()->json(['mensagem' => 'UF atualizado com sucesso!'], 200);
        }

        
    }
    public function destroy(Uf $uf)
    {
        $uf->delete();
        return response()->json(['mensagem' => 'UF excluída com sucesso!'], 200);
    }
    
}
