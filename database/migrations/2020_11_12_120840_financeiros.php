<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Financeiros extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
       Schema::create('financeiros', function(Blueprint $table) {
             $table->increments('idfinanceiro');
             $table->string('cnpj_cpf');
             $table->date('data');
             $table->date('vencimento');
             $table->string('documento');
             $table->string('descricao');
             $table->float('valor',12,2);
             $table->integer('situacao');
             $table->integer('avulso');
             $table->integer('tipotributo');
             $table->integer('codigotributo');
             $table->string('historico');
             $table->string('exercicio');
             $table->integer('idinstituicao');
             $table->string('codigoBarra');
             $table->integer('numeroparcela');
             $table->integer('retidofonte');
             $table->string('nossonumero');
             $table->string('contaReceita');
             $table->integer('contabancaria');
             $table->integer('tipodocumento');
             $table->integer('modalidadetaxa');
             $table->integer('usuario');
             $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financeiros');
    }
}
