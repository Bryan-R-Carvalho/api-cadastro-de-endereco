<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo_uf',
        'status',
    ];
    public function uf()
    {
        return $this->belongsTo(Uf::class);
    }

    public function bairros()
    {
        return $this->hasMany(Bairro::class);
    }
    
    public $timestamps = false;
    protected $primaryKey = 'codigo_municipio';
    protected $table = 'tb_municipio';

}
