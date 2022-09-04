<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pessoa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'sobrenome',
        'idade',
        'login',
        'senha',
        'status',
    ];
    public $table = 'tb_pessoa';
    public $timestamps = false;
    public $primaryKey = 'codigo_pessoa';

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }

    protected $hidden = [
        'senha',
        'remember_token',
    ];

}
