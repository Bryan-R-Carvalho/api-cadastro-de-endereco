<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo_municipio',
        'status',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public $timestamps = false;
    protected $primaryKey = 'codigo_bairro';
    protected $table = 'tb_bairro';
}
