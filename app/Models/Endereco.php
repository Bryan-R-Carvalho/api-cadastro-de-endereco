<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_pessoa',
        'codigo_bairro',
        'nome_rua',
        'numero',
        'complemento',
        'cep',
    ];
    public $table = 'tb_endereco';
    public $timestamps = false;
    public $primaryKey = 'codigo_endereco';

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
