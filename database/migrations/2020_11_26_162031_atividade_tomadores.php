<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AtividadeTomadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::Create('atividade_tomadores', function(Blueprint $table){
                     $table->Bigincrements('id')->unique();
                     $table->unsignedBigInteger('idatividade')->unsigned();
                     $table->unsignedBigInteger('idtomador')->unsigned();
                     $table->unsignedBigInteger('idinstituicao')->unsigned();
                     $table->timestamps();
                     $table->foreign('idinstituicao')->references('id')->on('instituicoes');
                     $table->foreign('idtomador')->references('id')->on('tomadores');
                     $table->foreign('idatividade')->references('id')->on('atividades');
                     
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividade_tomadores');
    }
}
