<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table->id('codigo_pessoa');
            $table->string('nome', 256);
            $table->string('sobrenome', 256);
            $table->smallInteger('idade');
            $table->string('login', 50);
            $table->string('senha', 50);
            $table->smallInteger('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_pessoa');
    }
};
