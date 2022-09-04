<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->id('codigo_endereco');
            $table->foreignId('codigo_pessoa')->constrained('tb_pessoa', 'codigo_pessoa');
            $table->foreignId('codigo_bairro')->constrained('tb_bairro', 'codigo_bairro');
            $table->string('nome_rua', 256);
            $table->string('numero', 10);
            $table->string('complemento', 20)->nullable();
            $table->string('cep', 10);

        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_endereco');
    }
};
