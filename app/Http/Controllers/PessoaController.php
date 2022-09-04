<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    private $user;
    public function __construct(Pessoa $user)
    {
        $this->model = $user;
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
        $this->validate($request, [
            'nome' => 'required',
            'sobrenome' => 'required',
            'idade' => 'required',
            'login' => 'required',
            'senha' => 'required',
            'status' => 'required',
        ]);
        $user = $this->model->create($request->all());
        return response()->json($user, 201);
    }

}