<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Instituicao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('instituicoes', function (Blueprint $table) {
                $table->increments('id')->unique();
                $table->string('cnpj')->unique();
                $table->string('instituicao');
                $table->string('endereco');
                $table->string('numero');
                $table->string('bairro');
                $table->string('cep');
                $table->string('fone');
                $table->string('responsavel');
                $table->integer('liberada');
                $table->timestamps();
               
            });  
    }

 
    public function down()
    {
        Schema::dropIfExists('instituicoes');
    }
}
