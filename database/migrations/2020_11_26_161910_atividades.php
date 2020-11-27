<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class atividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::Create('atividades', function (Blueprint $table){
           
              $table->Bigincrements('id')->unique();
              $table->String('codigo',10);
              $table->String('nomeatividade',100);
              $table->timestamps();
                   


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
