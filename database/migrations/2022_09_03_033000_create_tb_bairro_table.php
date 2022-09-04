<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_bairro', function (Blueprint $table) {
            $table->id('codigo_bairro');
            $table->string('nome', 256);
            $table->foreignId('codigo_municipio')->constrained('tb_municipio', 'codigo_municipio');
            $table->smallInteger('status');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_bairro');
    }
};
