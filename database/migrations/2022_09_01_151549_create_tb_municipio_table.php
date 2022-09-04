<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_municipio', function (Blueprint $table) {
            $table->id('codigo_municipio');
            $table->string('nome', 256);
            $table->smallInteger('status');
            $table->foreignId('codigo_uf')->constrained('tb_uf', 'codigo_uf')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_municipio');
    }
};
