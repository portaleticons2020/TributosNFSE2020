<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContaBancarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contaBancarias', function (Blueprint $table) {
            $table->integer('idConta');
            $table->string('codigoBanco');
            $table->string('agencia');
            $table->string('digitoAgencia');
            $table->string('conta');
            $table->string('digitoConta');
            $table->string('descricaoConta');
            $table->string('convenio');
            $table->string('codigofebraban');
            $table->integer('ativa');
            $table->integer('idinstituicao');
            $table->timestamps();
            //relacionamento
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
