<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    protected $fillable = [
        'sigla_uf',
        'nome',
        'status'
    ];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }

    public $timestamps = false;
    protected $primaryKey = 'codigo_uf';
    protected $table = 'tb_uf';

}
