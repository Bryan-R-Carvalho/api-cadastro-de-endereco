<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_uf', function (Blueprint $table) {
            $table->id('codigo_uf');
            $table->string('sigla_uf', 3)->unique();
            $table->string('nome', 60)->unique();
            $table->smallInteger('status');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_uf');
    }
};
