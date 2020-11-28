<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tomadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tomadores', function (Blueprint $table) {
            $table->Bigincrements('id')->unique();
            $table->string('documento',14);
            $table->string('nomeTomador',100);
            $table->integer('tipoTomador')->default(1);
            $table->date('dataCadastro');
            $table->string('inscricao_municipal',20);
            $table->string('inscricao_estadual',20);
            $table->integer('Contato');
            $table->integer('idAtividade');
            $table->integer('Regime');
            $table->string('endereco',100);
            $table->string('Numero',6);
            $table->string('cep',8);
            $table->string('cidade',50);
            $table->string('bairro',30);
            $table->string('uf',2);
            $table->string('observacao');
            $table->integer('idinstituicao');
            $table->integer('ativo')->default(1);
            $table->timestamps();
           

        }     );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tomadores');
    }
}
