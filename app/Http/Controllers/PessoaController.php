<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    private $pessoa;
    private $endereco;

    public function __construct(Pessoa $pessoa, Endereco $endereco)
    {
        $this->pessoa = $pessoa;
        $this->endereco = $endereco;
    }

    public function index(Request $request)
    {
        if(!$request->has('nome') && !$request->has('codigo_pessoa') && !$request->has('codigo_bairro') && !$request->has('codigo_municipio') && !$request->has('codigo_uf')) {
            return Pessoa::all();
        }
        return Pessoa::where('nome', $request->nome)
            ->orWhere('codigo_pessoa', $request->codigo_pessoa)
            ->orWhere('codigo_bairro', $request->codigo_bairro)
            ->orWhere('codigo_municipio', $request->codigo_municipio)
            ->orWhere('codigo_uf', $request->codigo_uf)
            ->get();
    }
    public function store(Request $request)
    {
        $pessoa = $this->pessoa->create($request->all());

        foreach($request->enderecos as $endereco) {
            Endereco::create([
                'codigo_pessoa' => $pessoa->codigo_pessoa,
                'codigo_bairro' => $endereco['codigo_bairro'],
                'nome_rua' => $endereco['nome_rua'],
                'numero' => $endereco['numero'],
                'complemento' => $endereco['complemento'],
                'cep' => $endereco['cep']
            ]);
        }
        return response()->json(['mensagem' => 'Pessoa cadastrada com sucesso!'], 201);
    }

    public function show(int $pessoa)
    {
        $data = Pessoa::find($pessoa);
        if($data === null){
            return response()->json(['messagem' => 'Nao existe esta pessoa'], 404);
        }else{
            return response()->json($data);
        }
    }
    public function update(int $pessoa, Request $request)
    {
        
        $data = Pessoa::find($pessoa);
        if($data === null){
            return response()->json(['messagem' => 'Nao existe esta pessoa'], 404);
        }else{
            $data->update($request->all());
            return response()->json(['messagem' => 'Pessoa atualizada com sucesso!'], 200);
        }
    }
    public function destroy(int $pessoa)
    {
        $data = Pessoa::find($pessoa);
        if($data === null){
            return response()->json(['messagem' => 'Nao existe esta pessoa'], 404);
        }else{
            $data->delete();
            return response()->json(['messagem' => 'Pessoa excluída com sucesso!'], 200);
        }
    }
}