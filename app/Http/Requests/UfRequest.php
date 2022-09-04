<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UfRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sigla_uf' => [
                'required',
                Rule::unique('tb_uf')->ignore($this->uf),
                'max:3',
            ],
            'nome' => [
                'required',
                'max:60',
            ],

        ];
    }
    public function messages()
    {
        return [
            'sigla_uf.required' => 'A sigla da UF é obrigatória!',
            'sigla_uf.string' => 'A sigla da UF deve ser uma string!',
            'sigla_uf.max' => 'A sigla da UF deve ter no máximo 3 caracteres!',
            'sigla_uf.unique' => 'A sigla da UF já existe!',
            'nome.required' => 'O nome da UF é obrigatório!',
            'nome.string' => 'O nome da UF deve ser uma string!',
            'nome.max' => 'O nome da UF deve ter no máximo 60 caracteres!',
            'nome.unique' => 'O nome da UF já existe!',
        ];
    }
    
}
